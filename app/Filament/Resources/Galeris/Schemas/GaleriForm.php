<?php

namespace App\Filament\Resources\Galeris\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class GaleriForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->required(),
                Textarea::make('deskripsi')
                    ->default(null)
                    ->columnSpanFull(),
                \Filament\Forms\Components\FileUpload::make('gambar')->disk('cloudinary')->image()->directory('uploads')
                    ->required(),
                \Filament\Forms\Components\Select::make('kategori')
                    ->options([
                        'MOS/MPLS' => 'MOS/MPLS',
                        '17-an' => 'Lomba 17-an',
                        'Class Meeting' => 'Class Meeting',
                        'Study Tour' => 'Study Tour',
                        'Ekskul' => 'Kegiatan Ekskul',
                    ])
                    ->required()
                    ->default('MOS/MPLS'),
                DatePicker::make('tanggal_kegiatan'),
            ]);
    }
}
