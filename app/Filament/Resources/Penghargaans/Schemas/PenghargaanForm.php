<?php

namespace App\Filament\Resources\Penghargaans\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PenghargaanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\TextInput::make('nama_penghargaan')
                    ->label('Nama Penghargaan')->required()->maxLength(255),

                \Filament\Forms\Components\Select::make('kategori')
                    ->label('Kategori')
                    ->options([
                        'Akademik' => 'Akademik',
                        'Non-Akademik' => 'Non-Akademik',
                        'Kelembagaan' => 'Kelembagaan',
                        'Adiwiyata' => 'Adiwiyata',
                        'Lainnya' => 'Lainnya',
                    ])->required(),

                \Filament\Forms\Components\Select::make('tingkat')
                    ->label('Tingkat')
                    ->options([
                        'Internasional' => 'Internasional',
                        'Nasional' => 'Nasional',
                        'Provinsi' => 'Provinsi',
                        'Kabupaten' => 'Kabupaten',
                        'Kecamatan' => 'Kecamatan',
                        'Sekolah' => 'Sekolah',
                    ])->required(),

                \Filament\Forms\Components\TextInput::make('tahun')
                    ->label('Tahun')->numeric()->required(),

                \Filament\Forms\Components\TextInput::make('penyelenggara')
                    ->label('Penyelenggara')->nullable(),

                \Filament\Forms\Components\Textarea::make('deskripsi')
                    ->label('Deskripsi Singkat')->nullable()->rows(3),

                \Filament\Forms\Components\FileUpload::make('foto')
                    ->label('Foto Penghargaan / Sertifikat')
                    ->image()->directory('penghargaan')->nullable(),

                \Filament\Forms\Components\Toggle::make('is_tampil')
                    ->label('Tampilkan di Website')->default(true),
            ]);
    }
}
