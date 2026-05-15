<?php

namespace App\Filament\Resources\Karyas\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class KaryaForm
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
                TextInput::make('pembuat')
                    ->required(),
                TextInput::make('kelas')
                    ->required(),
                \Filament\Forms\Components\FileUpload::make('gambar')->disk('cloudinary')->image()->directory('uploads')
                    ->default(null),
                \Filament\Forms\Components\Select::make('kategori')
                    ->options([
                        'Puisi' => 'Puisi',
                        'Cerpen' => 'Cerpen',
                        'Artikel' => 'Artikel',
                        'Visual' => 'Karya Visual',
                    ])
                    ->required()
                    ->default('Puisi'),
                Toggle::make('is_featured')
                    ->required(),
            ]);
    }
}
