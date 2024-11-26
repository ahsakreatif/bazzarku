<?php

namespace SolutionForest\FilamentAccessManagement\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Hash;
use SolutionForest\FilamentAccessManagement\Resources\UserResource\Pages;
use SolutionForest\FilamentAccessManagement\Resources\UserResource\RelationManagers;
use SolutionForest\FilamentAccessManagement\Support\Utils;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use App\Constants\Role as RoleConstant;
use App\Entities\User;
use Filament\Forms\Components\Hidden;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label(strval(__('filament-access-management::filament-access-management.field.user.name')))
                            ->required(),
                        Forms\Components\TextInput::make('email')
                            ->required()
                            ->email()
                            ->unique(table: static::getModel(), ignorable: fn ($record) => $record)
                            ->label(strval(__('filament-access-management::filament-access-management.field.user.email'))),
                        Forms\Components\TextInput::make('password')
                            ->same('passwordConfirmation')
                            ->password()
                            ->maxLength(255)
                            ->required(fn ($component, $get, $livewire, $model, $record, $set, $state) => $record === null)
                            ->dehydrateStateUsing(fn ($state) => ! empty($state) ? Hash::make($state) : '')
                            ->label(strval(__('filament-access-management::filament-access-management.field.user.password'))),
                        Forms\Components\TextInput::make('passwordConfirmation')
                            ->password()
                            ->dehydrated(false)
                            ->maxLength(255)
                            ->label(strval(__('filament-access-management::filament-access-management.field.user.confirm_password'))),
                        Fieldset::make('User Tenant')->relationship('tenant')
                            ->schema([
                                TextInput::make('tenant_name'),
                                TextInput::make('phone_number'),
                                TextInput::make('address'),
                                TextInput::make('city'),
                                Forms\Components\FileUpload::make('picture')
                                    ->image()
                                    ->avatar(),
                                Forms\Components\Textarea::make('profile')
                                    ->rows(3),
                            ])->hidden(fn (User $record): bool => !in_array(RoleConstant::TENANT, $record->roles->pluck('id')->toArray())),
                        Fieldset::make('User Vendor')->relationship('vendor')
                            ->schema([
                                TextInput::make('vendor_name'),
                                TextInput::make('phone_number'),
                                TextInput::make('address'),
                                TextInput::make('city'),
                                Forms\Components\FileUpload::make('picture')
                                    ->image()
                                    ->avatar(),
                                Forms\Components\Textarea::make('description')
                                    ->rows(3),
                            ])->hidden(fn (User $record): bool => !in_array(RoleConstant::VENDOR, $record->roles->pluck('id')->toArray())),
                        // Forms\Components\Select::make('roles')
                        //     ->multiple()
                        //     ->relationship('roles', 'name')
                        //     ->preload()
                        //     ->label(strval(__('filament-access-management::filament-access-management.field.user.roles'))),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->sortable()
                    ->label(strval(__('filament-access-management::filament-access-management.field.id'))),

                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->label(strval(__('filament-access-management::filament-access-management.field.user.name'))),

                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable()
                    ->label(strval(__('filament-access-management::filament-access-management.field.user.email'))),

                Tables\Columns\IconColumn::make('email_verified_at')
                    ->options([
                        'heroicon-o-check-circle',
                        'heroicon-o-x-circle' => fn ($state): bool => $state === null,
                    ])
                    ->colors([
                        'success',
                        'danger' => fn ($state): bool => $state === null,
                    ])
                    ->label(strval(__('filament-access-management::filament-access-management.field.user.verified_at'))),

                Tables\Columns\TagsColumn::make('roles.name')
                    ->label(strval(__('filament-access-management::filament-access-management.field.user.roles'))),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('Y-m-d H:i:s')
                    ->label(strval(__('filament-access-management::filament-access-management.field.user.created_at'))),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\RolesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
            'view' => Pages\ViewUser::route('/{record}'),
        ];
    }

    public static function getNavigationIcon(): string
    {
        return config('filament-access-management.filament.navigationIcon.user') ?? parent::getNavigationIcon();
    }

    public static function getModel(): string
    {
        return Utils::getUserModel() ?? parent::getModel();
    }

    public static function getNavigationGroup(): ?string
    {
        return strval(__('filament-access-management::filament-access-management.section.group'));
    }

    public static function getLabel(): string
    {
        return strval(__('filament-access-management::filament-access-management.section.user'));
    }

    public static function getPluralLabel(): string
    {
        return strval(__('filament-access-management::filament-access-management.section.users'));
    }
}
