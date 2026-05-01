<?php

namespace App\Filament\Resources\Penguruses\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PengurusForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required(),
                TextInput::make('jabatan')
                    ->required(),
                Select::make('kategori')
                    ->options(['OSIS' => 'OSIS', 'Kesiswaan' => 'Kesiswaan'])
                    ->default('OSIS')
                    ->required(),
                \Filament\Forms\Components\FileUpload::make('foto')->disk('cloudinary')
                    ->image()
                    ->directory('uploads')
                    ->default(null),
                TextInput::make('urutan')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
