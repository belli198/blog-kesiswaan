<?php

namespace App\Filament\Resources\SejarahSekolahs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SejarahSekolahsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('judul')
                    ->searchable(),
                \Filament\Tables\Columns\ImageColumn::make('foto_gedung')->disk('cloudinary'),
                \Filament\Tables\Columns\TextColumn::make('tahun_berdiri'),
                \Filament\Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                \Filament\Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                // Disable bulk delete since we only have 1 history record
            ]);
    }
}
