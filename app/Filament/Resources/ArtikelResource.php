<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArtikelResource\Pages;
use App\Filament\Resources\ArtikelResource\RelationManagers;
use App\Models\Artikel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;

class ArtikelResource extends Resource
{
    protected static ?string $model = Artikel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = "Artikel";
    protected static ?string $pluralModelLabel = "Artikel";
    protected static ?string $slug = 'artikel';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('konten')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('gambar')
                    ->maxLength(255),
                Forms\Components\TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                Forms\Components\Toggle::make('status')
                    ->required(),
                Forms\Components\DateTimePicker::make('published_at'),
                Forms\Components\TextInput::make('kategori')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->searchable(),
                TextColumn::make('user.name')
                    ->label('Nama Fasil')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
                Tables\Columns\ImageColumn::make('gambar')
                    ->label('Gambar')
                    ->disk('public')
                    ->height(60),
                Tables\Columns\TextColumn::make('published_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kategori')
                    ->searchable(),
                Tables\Columns\ViewColumn::make('Galeri')
                    ->label('Galeri')
                    ->view('filament.tables.columns.artikel-foto-preview'),
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
            'index' => Pages\ListArtikels::route('/'),
            'create' => Pages\CreateArtikel::route('/create'),
            'edit' => Pages\EditArtikel::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->with('fotos');
    }
}
