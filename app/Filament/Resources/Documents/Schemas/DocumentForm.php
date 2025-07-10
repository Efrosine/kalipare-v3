<?php

namespace App\Filament\Resources\Documents\Schemas;

use App\Models\DocumentType;
use App\Models\FamilyMember;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;

class DocumentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Applicant Data')
                    ->schema([
                        Select::make('applicant_id')
                            ->relationship(
                                'applicant',
                                titleAttribute: 'name',
                                modifyQueryUsing: fn(Builder $query) => $query->orderBy('name')
                            )
                            ->getOptionLabelFromRecordUsing(fn(FamilyMember $record): string =>
                                "{$record->national_id_number} - {$record->name}")
                            ->searchable(['national_id_number', 'name'])
                            ->preload()
                            ->required()
                            ->label('Select Applicant by National ID Number'),
                        TextInput::make('purpose')
                            ->required()
                            ->label('Purpose'),
                        DatePicker::make('signature_date')
                            ->default(now())
                            ->required()
                            ->label('Signature Date'),
                    ]),

                Section::make('Document Details')
                    ->schema([
                        Select::make('document_type_id')
                            ->relationship('documentType', 'type_name')
                            ->searchable()
                            ->required()
                            ->live() // IMPORTANT: This makes the form reactive
                            ->label('Document Type'),

                        // --- DYNAMIC FIELDS WILL BE RENDERED HERE ---
                        Grid::make()
                            ->columns(2)
                            ->schema(fn(Get $get): array => self::getDynamicFormFields($get('document_type_id')))
                    ])
            ])->columns(1);
    }
    public static function getDynamicFormFields(?string $documentTypeId): array
    {
        if (!$documentTypeId) {
            return [];
        }

        $formStructure = DocumentType::find($documentTypeId)?->form_structure ?? [];

        $fields = [];
        foreach ($formStructure as $field) {
            $fieldName = 'additional_data.' . $field['name'];
            $fieldLabel = $field['label'];

            $formComponent = match ($field['type']) {
                'textarea' => Textarea::make($fieldName),
                'date' => DatePicker::make($fieldName),
                'number' => TextInput::make($fieldName)->numeric(),
                default => TextInput::make($fieldName),
            };

            $fields[] = $formComponent
                ->label($fieldLabel)
                ->required($field['is_required'] ?? false);
        }
        return $fields;
    }
}
