<?php

namespace App\Filament\Resources\Prestasis\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PrestasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->required(),
                Textarea::make('deskripsi')
                    ->required()
                    ->columnSpanFull(),
                Select::make('tingkat')
                    ->options([
            'Sekolah' => 'Sekolah',
            'Kecamatan' => 'Kecamatan',
            'Kabupaten' => 'Kabupaten',
            'Provinsi' => 'Provinsi',
            'Nasional' => 'Nasional',
            'Internasional' => 'Internasional',
        ])
                    ->default('Kabupaten')
                    ->required(),
                TextInput::make('peraih')
                    ->required(),
                TextInput::make('tahun')
                    ->required(),
                \Filament\Forms\Components\FileUpload::make('gambar')->disk('cloudinary')->image()->directory('uploads')
                    ->default(null),
                Select::make('kategori')
                    ->options([
                        'Akademik' => 'Akademik',
                        'Non-Akademik' => 'Non-Akademik',
                    ])
                    ->required()
                    ->default('Akademik'),
            ]);
    }
}
