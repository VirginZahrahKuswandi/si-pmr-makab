<?php

namespace App\Exports;

use App\Models\AbsensiFasilitator;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class AbsensiFasilitatorExport implements FromCollection, WithHeadings, WithDrawings, WithMapping, WithEvents
{
    protected $ids;
    protected $rows;

    public function __construct(array $ids)
    {
        $this->ids = $ids;
    }

    public function collection()
    {
        $this->rows = AbsensiFasilitator::with([
            'fasilitator',
            'absensi.jadwal.sekolah',
            'absensi.foto.jenisAbsensiFoto',
        ])->whereIn('id', $this->ids)->get();

        return $this->rows;
    }

    public function headings(): array
    {
        return [
            'Nama Sekolah',
            'Tanggal',
            'Jam Mulai',
            'Jam Selesai',
            'Jumlah Siswa Hadir',
            'Deskripsi',
            'Materi',
            'Lokasi',
            'Dokumentasi Fasilitator Mengajar',
            'Dokumentasi Anggota Teori/Praktik',
            'Dokumentasi Foto Bersama',
            'Status',
            'Status Verifikasi',
            'Keterangan',
        ];
    }

    public function map($absensiFasilitator): array
    {
        $absensi = $absensiFasilitator->absensi;
        $jadwal = $absensi->jadwal;
        $sekolah = $jadwal->sekolah;


        return [
            $sekolah->nama ?? '',
            $jadwal->tanggal ?? '',
            $jadwal->jam_mulai ?? '',
            $jadwal->jam_selesai ?? '',
            $absensi->jumlah_siswa_hadir ?? '',
            $absensi->deskripsi ?? '',
            $absensi->materi ?? '',
            $absensi->lokasi ?? '',
            '', // Foto Mengajar (gambar diinsert via drawings)
            '', // Foto Anggota
            '', // Foto Bersama
            $absensiFasilitator->status ?? '',
            $absensiFasilitator->status_verifikasi ?? '',
            $absensiFasilitator->keterangan ?? '',
        ];
    }

    public function drawings()
    {
        $drawings = [];
        $rows = $this->rows ?? $this->collection();

        foreach ($rows as $index => $absensiFasilitator) {
            $fotoMap = [
                'fasilitator_mengajar' => 'I', // Kolom ke-9
                'anggota_praktik' => 'J', // Kolom ke-10
                'foto_bersama' => 'K', // Kolom ke-11
            ];

            foreach ($fotoMap as $jenis => $kolom) {
                $foto = $absensiFasilitator->absensi->foto
                    ->firstWhere(fn($f) => $f->jenisAbsensiFoto?->nama === $jenis);

                if ($foto && file_exists(storage_path('app/public/' . $foto->path))) {
                    $drawing = new Drawing();
                    $drawing->setName(ucwords(str_replace('_', ' ', $jenis)));
                    $drawing->setDescription($jenis);
                    $drawing->setPath(storage_path('app/public/' . $foto->path));
                    $drawing->setHeight(240);
                    $drawing->setCoordinates($kolom . ($index + 2));
                    $drawing->setOffsetX(5);
                    $drawing->setOffsetY(5);
                    $drawing->setWorksheet(null);
                    $drawing->setResizeProportional(true);
                    $drawings[] = $drawing;
                    $drawing->setResizeProportional(true);
                }
            }
        }

        return $drawings;
    }


    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                foreach (range(2, count($this->rows) + 1) as $row) {
                    $event->sheet->getDelegate()->getRowDimension($row)->setRowHeight(240);

                    foreach (range('A', 'N') as $col) {
                        $cell = $col . $row;
                        $event->sheet->getDelegate()->getStyle($cell)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
                        $event->sheet->getDelegate()->getStyle($cell)->getAlignment()->setWrapText(true); // opsional, jika ingin wrap text
                    }
                }

                $columns = ['I', 'J', 'K'];
                foreach ($columns as $column) {
                    $event->sheet->getDelegate()->getColumnDimension($column)->setWidth(70);
                }
            },
        ];
    }
}
