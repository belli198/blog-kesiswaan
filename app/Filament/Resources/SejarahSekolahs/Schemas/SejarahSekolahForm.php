<?php

namespace App\Filament\Resources\SejarahSekolahs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class SejarahSekolahForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\TextInput::make('judul')
                    ->label('Judul')
                    ->required()
                    ->maxLength(255)
                    ->default('Sejarah SMK Negeri 1 Adiwerna'),
                \Filament\Forms\Components\RichEditor::make('konten')
                    ->label('Konten Sejarah')
                    ->required()
                    ->columnSpanFull(),
                \Filament\Forms\Components\FileUpload::make('foto_gedung')
                    ->label('Foto Gedung (Opsional)')
                    ->image()
                    ->directory('sejarah')
                    ->nullable(),
                \Filament\Forms\Components\TextInput::make('tahun_berdiri')
                    ->label('Tahun Berdiri')
                    ->numeric()
                    ->required()
                    ->default(1969),
            ]);
    }
}
