<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JadwalSekolahResource\Pages;
use App\Filament\Resources\JadwalSekolahResource\RelationManagers;
use App\Models\JadwalSekolah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TagsColumn;
use Filament\Forms\Components\TimePicker;

class JadwalSekolahResource extends Resource
{
    protected static ?string $model = JadwalSekolah::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = "Jadwal Sekolah";
    protected static ?string $pluralModelLabel = "Jadwal Sekolah";
    protected static ?string $slug = "jadwal-sekolah";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('sekolah_id')
                    ->label('Sekolah')
                    ->relationship('sekolah', 'nama')
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('fasilitator_id')
                    ->label('Fasilitator')
                    ->relationship('fasilitator', 'nama')
                    ->multiple()
                    ->searchable()
                    ->reactive()
                    ->afterStateHydrated(function ($component, $state) {})
                    ->dehydrateStateUsing(fn($state) => $state),
                Forms\Components\DatePicker::make('tanggal')
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        $set('fasilitator_id', []);
                    }),
                Forms\Components\TimePicker::make('jam_mulai')
                    ->seconds(false)
                    ->format('H:i')
                    ->displayFormat('H:i')
                    ->required(),
                Forms\Components\TimePicker::make('jam_selesai')
                    ->seconds(false)
                    ->format('H:i')
                    ->displayFormat('H:i')
                    ->required(),
                Forms\Components\TextInput::make('deskripsi')
                    ->maxLength(255),
                Forms\Components\TextInput::make('penanggungjawab')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('kontak_pj')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('pembina')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('kontak_pembina')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                    ])
                    ->required(),

                Forms\Components\Textarea::make('catatan')
                    ->label('Catatan Admin'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('sekolah.nama')
                    ->label('Nama Sekolah')
                    ->sortable()
                    ->searchable(),

                TagsColumn::make('fasilitator.nama')
                    ->label('Fasilitator')
                    ->separator(', '),
                Tables\Columns\TextColumn::make('tanggal')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jam_mulai'),
                Tables\Columns\TextColumn::make('jam_selesai'),
                Tables\Columns\TextColumn::make('deskripsi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('penanggungjawab')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kontak_pj')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pembina')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kontak_pembina')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'approved',
                        'danger' => 'rejected',
                    ])
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('creator.name')
                    ->label('Direquest Oleh')
                    ->sortable()
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
            'index' => Pages\ListJadwalSekolahs::route('/'),
            'create' => Pages\CreateJadwalSekolah::route('/create'),
            'edit' => Pages\EditJadwalSekolah::route('/{record}/edit'),
        ];
    }
}
