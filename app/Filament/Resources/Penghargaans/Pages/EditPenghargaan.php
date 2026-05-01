<?php

namespace App\Filament\Resources\Penghargaans\Pages;

use App\Filament\Resources\Penghargaans\PenghargaanResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPenghargaan extends EditRecord
{
    protected static string $resource = PenghargaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
