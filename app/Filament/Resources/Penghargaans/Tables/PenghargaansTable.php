<?php

namespace App\Filament\Resources\Penghargaans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PenghargaansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('nama_penghargaan')
                    ->label('Nama Penghargaan')->searchable()->sortable(),
                \Filament\Tables\Columns\TextColumn::make('tingkat')
                    ->label('Tingkat')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Nasional' => 'warning',
                        'Provinsi' => 'primary',
                        'Kabupaten' => 'success',
                        'Internasional' => 'danger',
                        default => 'gray',
                    }),
                \Filament\Tables\Columns\TextColumn::make('tahun')->sortable(),
                \Filament\Tables\Columns\TextColumn::make('kategori'),
                \Filament\Tables\Columns\IconColumn::make('is_tampil')
                    ->label('Ditampilkan')->boolean(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
