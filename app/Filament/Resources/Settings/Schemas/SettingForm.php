<?php

namespace App\Filament\Resources\Settings\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class SettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('label')
                    ->label('Nama Pengaturan')
                    ->disabled()
                    ->required(),
                TextInput::make('key')
                    ->label('Kode Kunci')
                    ->disabled()
                    ->required(),
                \Filament\Forms\Components\FileUpload::make('value')->disk('cloudinary')
                    ->label('Upload Gambar (Bisa banyak untuk Slider)')
                    ->image()
                    ->multiple()
                    ->reorderable()
                    ->deletable()
                    ->directory('settings')
                    ->hidden(fn ($get) => $get('type') !== 'image')
                    ->formatStateUsing(function ($state) {
                        if (is_string($state)) {
                            return json_decode($state, true) ?? [$state];
                        }
                        return $state;
                    })
                    ->dehydrateStateUsing(fn ($state) => json_encode($state)),
                \Filament\Forms\Components\Textarea::make('value')
                    ->label('Konten Teks')
                    ->hidden(fn ($get) => $get('type') === 'image')
                    ->columnSpanFull(),
                TextInput::make('type')
                    ->hidden()
                    ->required(),
            ]);
    }
}
