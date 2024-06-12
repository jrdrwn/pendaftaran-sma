<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AsalSekolahResource\Pages;
use App\Filament\Resources\AsalSekolahResource\RelationManagers;
use App\Models\AsalSekolah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AsalSekolahResource extends Resource
{
    protected static ?string $model = AsalSekolah::class;

    protected static ?int $navigationSort = 2;
    protected static ?string $navigationIcon = 'heroicon-o-home-modern';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->maxLength(255)->required(),
                Forms\Components\Radio::make('status')->options([
                    'negeri' => 'Negeri',
                    'swasta' => 'Swasta',
                ])->required(),
                Forms\Components\Textarea::make('alamat')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status'),

            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListAsalSekolahs::route('/'),
            'create' => Pages\CreateAsalSekolah::route('/create'),
            'edit' => Pages\EditAsalSekolah::route('/{record}/edit'),
        ];
    }
}
