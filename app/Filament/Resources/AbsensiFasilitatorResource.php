<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AbsensiFasilitatorResource\Pages;
use App\Filament\Resources\AbsensiFasilitatorResource\RelationManagers;
use App\Models\AbsensiFasilitator;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AbsensiFasilitatorResource extends Resource
{
    protected static ?string $model = AbsensiFasilitator::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Absensi Fasilitator';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('status')
                    ->required(),
                Forms\Components\Select::make('status_verifikasi')
                    ->options([
                        'pending' => 'Pending',
                        'disetujui' => 'Disetujui',
                        'ditolak' => 'Ditolak',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordUrl(null)
            ->columns([
                Tables\Columns\TextColumn::make('fasilitator.nama'),
                Tables\Columns\TextColumn::make('absensi.jadwal.sekolah.nama'),
                Tables\Columns\ViewColumn::make('')
                    ->label('Dokumentasi')
                    ->view('filament.tables.columns.absensi-foto'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('status_verifikasi')->badge(),
                Tables\Columns\TextColumn::make('status_verifikasi'),
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
            'index' => Pages\ListAbsensiFasilitators::route('/'),
            'create' => Pages\CreateAbsensiFasilitator::route('/create'),
            'edit' => Pages\EditAbsensiFasilitator::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with('absensi.foto');
    }
}
