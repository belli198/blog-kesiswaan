<?php

namespace App\Filament\Resources\SejarahSekolahs\Pages;

use App\Filament\Resources\SejarahSekolahs\SejarahSekolahResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSejarahSekolah extends EditRecord
{
    protected static string $resource = SejarahSekolahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
