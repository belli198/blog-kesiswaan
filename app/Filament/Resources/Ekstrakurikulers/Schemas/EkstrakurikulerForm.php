<?php

namespace App\Filament\Resources\Ekstrakurikulers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class EkstrakurikulerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required(),
                Textarea::make('deskripsi')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('pembina')
                    ->required(),
                TextInput::make('jadwal')
                    ->required(),
                TextInput::make('tempat')
                    ->required(),
                \Filament\Forms\Components\FileUpload::make('gambar')->disk('cloudinary')->image()->directory('uploads')
                    ->default(null),
                TextInput::make('kategori')
                    ->required()
                    ->default('Umum'),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
