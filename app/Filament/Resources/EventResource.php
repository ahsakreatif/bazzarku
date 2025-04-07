<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Entities\Event;
use Faker\Provider\ar_EG\Text;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube-transparent';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Hidden::make('user_id')
                    ->default(Auth::id()),
                TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->reactive()
                    ->debounce(600)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                TextInput::make('slug')
                    ->placeholder('convention-title-2024')
                    ->required(),
                TextInput::make('start_date')
                    ->label('Start Date')
                    ->type('datetime-local')
                    ->required(),
                TextInput::make('end_date')
                    ->label('End Date')
                    ->type('datetime-local')
                    ->required(),
                TextInput::make('price')
                    ->prefix('IDR')
                    ->label('Price')
                    ->type('number')
                    ->required(),
                Select::make('event_type_id')
                    ->label('Event Type')
                    ->relationship('type', 'name')
                    ->required(),
                Select::make('status')
                    ->label('Status')
                    ->options(\App\Constants\StatusEvent::$status_labels)
                    ->default(\App\Constants\StatusEvent::DRAFT),
                TinyEditor::make('description')
                    ->label('Description')
                    ->columnSpan(2),
                FileUpload::make('picture')
                    ->label('Picture')
                    ->image()
                    ->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_date')
                    ->dateTime()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->dateTime()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->searchable()
                    ->formatStateUsing(fn (string $state): string => 'Rp' . number_format($state, 0, ',', '.'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('type.name')
                    ->label('Event Type')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])->modifyQueryUsing(function (Builder $query) {
                if (Auth::user()->hasRole('vendor')) {
                    $query->where('user_id', Auth::id());
                }
            });
    }

    public static function getRelations(): array
    {
        return [
            EventResource\RelationManagers\EventTenantsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
