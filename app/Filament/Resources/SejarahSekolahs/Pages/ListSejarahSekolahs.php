<?php

namespace App\Filament\Resources\SejarahSekolahs\Pages;

use App\Filament\Resources\SejarahSekolahs\SejarahSekolahResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSejarahSekolahs extends ListRecords
{
    protected static string $resource = SejarahSekolahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
