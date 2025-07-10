<?php

namespace App\Filament\Resources\DocumentTypes\Schemas;


use Filament\Forms\Components\CodeEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class DocumentTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make('Basic Information')
                    ->schema([
                        TextInput::make('type_name')
                            ->required()
                            ->helperText('The full name of the document type.'),
                        TextInput::make('number_registration')
                            ->required()
                            ->helperText('The registration number of the document type.'),
                    ]),

                Section::make('Form Field Builder')
                    ->description('Define the additional fields needed for this document type.')
                    ->collapsed()

                    ->schema([
                        Repeater::make('form_structure')
                            ->addActionLabel('Add New Field')
                            ->columns(2)
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->helperText('The field key (no spaces, e.g., "reason_for_request").'),
                                TextInput::make('label')
                                    ->required()
                                    ->helperText('The user-friendly label shown on the form.'),
                                Select::make('type')
                                    ->required()
                                    ->options([
                                        'text' => 'Text',
                                        'textarea' => 'Text Area',
                                        'date' => 'Date',
                                        'number' => 'Number',
                                    ]),
                                Toggle::make('is_required')
                                    ->label('Is this field required?')
                                    ->default(false),
                            ]),
                    ]),

                Section::make('PDF Template Editor')
                    ->description('Design the PDF output. Use Blade variables to insert data.')
                    ->collapsed()
                    ->schema([
                        CodeEditor::make('template')
                            ->required()
                            ->columnSpanFull()
                            ->helperText('Use variables like {{ $applicant->name }} or {{ $additional_data[\'your_field_name\'] }}. You can use any Blade syntax.')
                    ]),
            ]);
    }

}
