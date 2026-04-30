<?php

namespace App\Filament\Resources\Karyas\Pages;

use App\Filament\Resources\Karyas\KaryaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditKarya extends EditRecord
{
    protected static string $resource = KaryaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
