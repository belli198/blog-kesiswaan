<?php

namespace App\Filament\Resources\ProgramSekolahs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProgramSekolahForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_program')
                    ->label('Nama Program')
                    ->required()
                    ->maxLength(255),

                TextInput::make('ikon')
                    ->label('Ikon (Emoji)')
                    ->maxLength(10)
                    ->default('📋')
                    ->helperText('Masukkan emoji, contoh: 🏭 📜 🏢 🌿 ⚙️ 💼'),

                Textarea::make('deskripsi')
                    ->label('Deskripsi Program')
                    ->required()
                    ->rows(4)
                    ->columnSpanFull(),

                TextInput::make('urutan')
                    ->label('Urutan Tampil')
                    ->numeric()
                    ->default(0),

                Toggle::make('is_aktif')
                    ->label('Aktif (Tampil di Website)')
                    ->default(true),
            ]);
    }
}
