<?php

namespace App\Filament\Resources\Karyas\Pages;

use App\Filament\Resources\Karyas\KaryaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKaryas extends ListRecords
{
    protected static string $resource = KaryaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
