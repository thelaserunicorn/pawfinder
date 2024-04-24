<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Components\Component;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Pages\Actions\Action;
use Filament\Notifications\Notification;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $pluralModelLabel = "Shelters";

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    public static function getEloquentQuery(): Builder
{
    return static::getModel()::query()->where('is_shelter', 1);
}

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('name'),
                Forms\Components\TextInput::make('budget'),
                Forms\Components\TextInput::make('email')
                    ->email(),
            Forms\Components\Select::make('roles')
                    ->preload()
                    ->multiple()
                    ->relationship('roles', 'name')
                    ->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\BooleanColumn::make('is_shelter'),
                Tables\Columns\TextColumn::make('budget')->sortable(),

            ])
            ->defaultSort('budget', 'asc')
            ->filters([
                //
            ])
            ->actions([
            Tables\Actions\Action::make("Donate")
                    ->requiresConfirmation()
                    ->modalHeading('Donate to shelter?')
                    ->color('success')
                    ->modalDescription('Are you sure you\'d like to donate to this shelter? This cannot be undone.')
                    ->modalSubmitActionLabel('Yes, donate')
                    ->action(fn () => redirect()->route('donation'))
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
