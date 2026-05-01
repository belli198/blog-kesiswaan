<?php

namespace App\Filament\Resources\ProgramSekolahs\Pages;

use App\Filament\Resources\ProgramSekolahs\ProgramSekolahResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\CreateAction;

class ListProgramSekolahs extends ListRecords
{
    protected static string $resource = ProgramSekolahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
