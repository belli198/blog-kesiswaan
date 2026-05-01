<?php

namespace App\Filament\Resources\Penghargaans\Pages;

use App\Filament\Resources\Penghargaans\PenghargaanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPenghargaans extends ListRecords
{
    protected static string $resource = PenghargaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
