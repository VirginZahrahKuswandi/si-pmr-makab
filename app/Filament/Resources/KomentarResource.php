<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KomentarResource\Pages;
use App\Filament\Resources\KomentarResource\RelationManagers;
use App\Models\Komentar;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KomentarResource extends Resource
{
    protected static ?string $model = Komentar::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = "Komentar";
    protected static ?string $pluralModelLabel = "Komentar";
    protected static ?string $slug = "komentar";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('artikel_id')
                    ->label('Judul Artikel')
                    ->relationship('artikel', 'judul')
                    ->required(),
                Forms\Components\Select::make('user_id')
                    ->label('Nama User')
                    ->relationship('user', 'name')
                    ->required(),
                Forms\Components\Select::make('parent_id')
                    ->label('Parent Komentar')
                    ->options(
                        fn() => \App\Models\Komentar::pluck('isi', 'id')
                    )
                    ->searchable()
                    ->nullable(),
                Forms\Components\Textarea::make('isi')
                    ->label('Komentar')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('artikel.judul')
                    ->label('Judul Artikel')
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Nama User')
                    ->sortable(),
                Tables\Columns\TextColumn::make('isi')
                    ->label('Komentar')
                    ->sortable(),
                Tables\Columns\TextColumn::make('parent_id')
                    ->label('Parent ID')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListKomentars::route('/'),
            'create' => Pages\CreateKomentar::route('/create'),
            'edit' => Pages\EditKomentar::route('/{record}/edit'),
        ];
    }
}
