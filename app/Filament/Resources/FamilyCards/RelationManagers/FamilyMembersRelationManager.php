<?php

namespace App\Filament\Resources\FamilyCards\RelationManagers;

use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FamilyMembersRelationManager extends RelationManager
{
    protected static string $relationship = 'familyMembers';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('national_id_number')->label('NIK')->required()->unique(ignoreRecord: true),
                TextInput::make('name')->required(),
                Select::make('gender')->options(['Male' => 'Male', 'Female' => 'Female'])->required(),
                TextInput::make('place_of_birth')->required(),
                DatePicker::make('date_of_birth')->required(),
                TextInput::make('religion')->required(),
                Select::make('marital_status')->options(['Single' => 'Single', 'Married' => 'Married', 'Divorced' => 'Divorced'])->required(),
                TextInput::make('family_relationship_status')->required(),
                TextInput::make('education')->nullable(),
                TextInput::make('occupation')->nullable(),
                TextInput::make('mothers_name')->nullable(),
                TextInput::make('fathers_name')->nullable(),
                TextInput::make('blood_type')->nullable(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('national_id_number')->label('NIK')->searchable(),
                TextColumn::make('name')->searchable(),
                TextColumn::make('gender'),
                TextColumn::make('family_relationship_status')->label('Relationship'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make(),
                AssociateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DissociateAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DissociateBulkAction::make(),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
