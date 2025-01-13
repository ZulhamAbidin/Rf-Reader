<?php

namespace App\Filament\Resources\GerbangAbsensiResource\Pages;

use App\Filament\Resources\GerbangAbsensiResource;
use App\Models\GerbangAbsensi;
use Filament\Resources\Pages\ViewRecord;

class DetailGerbangAbsensi extends ViewRecord
{
    protected static string $resource = GerbangAbsensiResource::class;

    // Hubungkan ke file blade custom
    protected static string $view = 'filament.resources.gerbang-absensi-resource.pages.detail-gerbang-absensi';

    public $siswaHadir;
    public $siswaAlpha;

    public function mount($record): void
    {
        parent::mount($record);

        // Ambil detail gerbang absensi dan siswa terkait
        $this->record->load(['absensi.siswa', 'kelas', 'mataPelajaran', 'pertemuan']);

        // Filter siswa hadir dan siswa alfa
        $this->siswaHadir = $this->record->absensi->where('status_kehadiran', 'hadir');
        $this->siswaAlpha = $this->record->absensi->where('status_kehadiran', 'alfa');
    }
}