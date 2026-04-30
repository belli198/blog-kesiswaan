<?php

namespace App\Filament\Resources\Pesans\Pages;

use App\Filament\Resources\Pesans\PesanResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPesan extends ViewRecord
{
    protected static string $resource = PesanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
