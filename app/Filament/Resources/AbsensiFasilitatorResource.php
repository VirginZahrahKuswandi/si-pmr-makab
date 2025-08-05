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
use Filament\Forms\Components\Textarea;
use Filament\Tables\Actions\Action;
use App\Exports\AbsensiFasilitatorExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Collection;

class AbsensiFasilitatorResource extends Resource
{
    protected static ?string $model = AbsensiFasilitator::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = "Absensi Fasilitator";
    protected static ?string $pluralModelLabel = "Absensi Fasilitator";
    protected static ?string $slug = 'absensi-fasilitator';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('status')
                    ->label('Status Absensi')
                    ->options([
                        'sudah_absen' => 'Sudah Absen',
                        'belum_absen' => 'Belum Absen',
                    ])
                    ->required()
                    ->native(false),

                Forms\Components\Select::make('status_verifikasi')
                    ->label('Status Verifikasi')
                    ->options([
                        'pending' => 'Pending',
                        'disetujui' => 'Disetujui',
                        'ditolak' => 'Ditolak',
                    ])
                    ->required()
                    ->native(false),

                Textarea::make('keterangan')
                    ->label('Keterangan Tambahan')
                    ->rows(3)
                    ->placeholder('Tuliskan alasan atau catatan tambahan (opsional)...')
                    ->maxLength(255),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->recordUrl(null)
            ->columns([
                Tables\Columns\TextColumn::make('fasilitator.nama')
                    ->label('Fasilitator')
                    ->searchable(),

                Tables\Columns\TextColumn::make('absensi.jadwal.sekolah.nama')
                    ->label('Nama Sekolah')
                    ->searchable(),

                Tables\Columns\ViewColumn::make('')
                    ->label('Dokumentasi')
                    ->view('filament.tables.columns.absensi-foto'),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status Absen')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'sudah_absen' => 'success',
                        'belum_absen' => 'secondary',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('status_verifikasi')
                    ->label('Status Verifikasi')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'disetujui' => 'success',
                        'ditolak' => 'danger',
                        'pending' => 'warning',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('Ubah')
                    ->icon('heroicon-m-pencil'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Hapus Terpilih'),
                ]),
                Tables\Actions\BulkAction::make('Export ke Excel')
                    ->action(function (Collection $records) {
                        $ids = $records->pluck('id')->toArray();
                        $export = new AbsensiFasilitatorExport($ids);

                        return Excel::download($export, 'absensi_fasilitator.xlsx');
                    })
                    ->deselectRecordsAfterCompletion()
                    ->requiresConfirmation()
                    ->icon('heroicon-o-document-arrow-down'),
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
        return parent::getEloquentQuery()
            ->with([
                'fasilitator',
                'absensi.jadwal.sekolah',
                'absensi.foto',
            ]);
    }
}
