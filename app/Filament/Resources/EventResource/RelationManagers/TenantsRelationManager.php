<?php

namespace App\Filament\Resources\EventResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;

class TenantsRelationManager extends RelationManager
{
    protected static string $relationship = 'tenants';
    protected static ?string $label = 'Tenants';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('tenant_id')
                    ->label('Tenant')
                    ->relationship('tenant', 'tenant_name')
                    ->searchable()
                    ->required(),
                Select::make('status')
                    ->label('Status')
                    ->options(\App\Constants\StatusSubmit::$status_labels)
                    ->required(),
                TextInput::make('start_date')
                    ->label('Start Date')
                    ->type('datetime-local')
                    ->required(),
                TextInput::make('end_date')
                    ->label('End Date')
                    ->type('datetime-local')
                    ->required(),
                FileUpload::make('payment_proof')
                    ->image()
                    ->columnSpan(2),
                Textarea::make('message')
                    ->label('Message')
                    ->columnSpan(2)
                    ->rows(3),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('tenant.name')
                    ->label('Tenant')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn ($record) => \App\Constants\StatusSubmit::matchColor($record->status))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_date'),
                Tables\Columns\TextColumn::make('end_date'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
