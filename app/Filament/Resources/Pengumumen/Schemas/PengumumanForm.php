<?php

namespace App\Filament\Resources\Pengumumen\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PengumumanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->required(),
                \Filament\Forms\Components\RichEditor::make('konten')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('kategori')
                    ->required()
                    ->default('Umum'),
                Select::make('prioritas')
                    ->options(['rendah' => 'Rendah', 'sedang' => 'Sedang', 'tinggi' => 'Tinggi'])
                    ->default('sedang')
                    ->required(),
                DatePicker::make('tanggal_mulai')
                    ->required(),
                DatePicker::make('tanggal_selesai')
                    ->required(),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
