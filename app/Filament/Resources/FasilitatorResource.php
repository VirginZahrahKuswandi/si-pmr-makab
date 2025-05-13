<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FasilitatorResource\Pages;
use App\Filament\Resources\FasilitatorResource\RelationManagers;
use App\Models\Fasilitator;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FasilitatorResource extends Resource
{
    protected static ?string $model = Fasilitator::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('pelatihan_sertifikasi')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('pendidikan_terakhir')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nomor_anggota_pmi')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nomor_anggota_makab')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pendidikan_terakhir')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nomor_anggota_pmi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nomor_anggota_makab')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pelatihan_sertifikasi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tahun_bergabung_makab')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListFasilitators::route('/'),
            'create' => Pages\CreateFasilitator::route('/create'),
            'edit' => Pages\EditFasilitator::route('/{record}/edit'),
        ];
    }
}
