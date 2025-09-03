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

    protected static ?string $navigationLabel = "Fasilitator";
    protected static ?string $pluralModelLabel = "Fasilitator";
    protected static ?string $slug = 'fasilitator';

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
                Forms\Components\TextInput::make('tahun_bergabung_makab')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tempat_lahir')
                    ->maxLength(255)
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_lahir')
                    ->required(),
                Forms\Components\TextInput::make('nomor_rekening_bank_dki')
                    ->maxLength(255)
                    ->nullable(),
                Forms\Components\TextInput::make('alamat')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('telepon')
                    ->tel()
                    ->required()
                    ->maxLength(20),
                Forms\Components\TextInput::make('npwp')
                    ->maxLength(20)
                    ->nullable(),
                Forms\Components\FileUpload::make('foto')
                    ->image()
                    ->directory('fasilitator_foto')
                    ->maxSize(10240)
                    ->label('Foto')
                    ->required(),
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
                Tables\Columns\TextColumn::make('tahun_bergabung_makab')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tempat_lahir')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_lahir')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('nomor_rekening_bank_dki')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('alamat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telepon')
                    ->searchable(),
                Tables\Columns\TextColumn::make('npwp')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\ViewColumn::make('')
                    ->label('Foto')
                    ->view('filament.tables.columns.foto-profil'),
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
