<?php

namespace App\Filament\Resources\Beritas\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class BeritaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                \Filament\Forms\Components\RichEditor::make('konten')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('ringkasan')
                    ->default(null)
                    ->columnSpanFull(),
                \Filament\Forms\Components\FileUpload::make('gambar')->image()->directory('uploads')
                    ->default(null),
                \Filament\Forms\Components\Select::make('kategori')
                    ->options([
                        'Umum' => 'Umum',
                        'OSIS' => 'OSIS',
                        'Ekskul' => 'Ekskul',
                        'Akademik' => 'Akademik',
                        'Kegiatan' => 'Kegiatan',
                    ])
                    ->required()
                    ->default('Umum'),
                TextInput::make('penulis')
                    ->required()
                    ->default('Admin'),
                Toggle::make('is_published')
                    ->required(),
                DateTimePicker::make('published_at'),
            ]);
    }
}
