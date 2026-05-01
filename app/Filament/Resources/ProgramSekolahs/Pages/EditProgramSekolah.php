<?php

namespace App\Filament\Resources\ProgramSekolahs\Pages;

use App\Filament\Resources\ProgramSekolahs\ProgramSekolahResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditProgramSekolah extends EditRecord
{
    protected static string $resource = ProgramSekolahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
