<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SendReqResource\Pages;
use App\Filament\Resources\SendReqResource\RelationManagers;
use App\Models\SendReq;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SendReqResource extends Resource
{
    protected static ?string $model = SendReq::class;

    protected static ?string $pluralModelLabel = "Requests";
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

        public static function canCreate(): bool
    {
        return false;
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('animal_id'),
                Forms\Components\TextInput::make('animal_name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('animal_name'),
                Tables\Columns\TextColumn::make('animal_id')
            ])
            ->filters([
                //
            ])
            ->actions([

                Tables\Actions\DeleteAction::make(),
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListSendReqs::route('/'),
            'edit' => Pages\EditSendReq::route('/{record}/edit'),
        ];
    }
}
