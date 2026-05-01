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
                TextInput::make('kategori')
                    ->required()
                    ->default('Kegiatan'),
                DatePicker::make('tanggal_kegiatan'),
            ]);
    }
}
