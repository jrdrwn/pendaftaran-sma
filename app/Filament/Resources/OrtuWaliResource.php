<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrtuWaliResource\Pages;
use App\Filament\Resources\OrtuWaliResource\RelationManagers;
use App\Models\OrtuWali;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrtuWaliResource extends Resource
{
    protected static ?string $model = OrtuWali::class;

    protected static ?int $navigationSort = 4;
    protected static ?string $navigationLabel = "Orang Tua/Wali";
    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Radio::make('peran')->options([
                    'ayah' => 'Ayah',
                    'ibu' => 'Ibu',
                    'wali' => 'Wali',
                ])->required(),
                Forms\Components\Select::make('ortu_wali_dari_calon')
                    ->relationship('calon', 'nama')->searchable()->preload()
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->nik . ' - ' . $record->nama . ' - ' . $record->asal_sekolah->nama)
                    // combine calon.nama and calon.id
                    ->required(),
                Forms\Components\TextInput::make('nama')
                    ->maxLength(255)->required(),
                Forms\Components\Select::make('id_pendidikan_terakhir')
                    ->relationship('pendidikan', 'nama')
                    ->searchable()
                    ->preload()
                    ->createOptionForm(
                        [
                            Forms\Components\TextInput::make('nama')
                                ->maxLength(255),
                        ]
                    )->required(),
                Forms\Components\Select::make('id_pekerjaan')
                    ->relationship('pekerjaan', 'nama')
                    ->searchable()
                    ->preload()
                    ->createOptionForm(
                        [
                            Forms\Components\TextInput::make('nama')
                                ->maxLength(255),
                        ]
                    )->required(),
                Forms\Components\TextInput::make('penghasilan_per_bulan')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('no_hp')
                    ->tel()->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('peran'),
                Tables\Columns\TextColumn::make('calon.nik')
                    ->label('NIK Calon')
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pendidikan.nama')
                    ->sortable(),
                Tables\Columns\TextColumn::make('pekerjaan.nama')
                    ->sortable(),
                Tables\Columns\TextColumn::make('penghasilan_per_bulan')
                    ->money('IDR', locale: 'id_ID')
                    ->sortable(),
                Tables\Columns\TextColumn::make('no_hp')
                    ->searchable(),
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
            'index' => Pages\ListOrtuWalis::route('/'),
            'create' => Pages\CreateOrtuWali::route('/create'),
            'edit' => Pages\EditOrtuWali::route('/{record}/edit'),
        ];
    }
}
