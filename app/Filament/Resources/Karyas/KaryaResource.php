<?php

namespace App\Filament\Resources\Karyas;

use App\Filament\Resources\Karyas\Pages\CreateKarya;
use App\Filament\Resources\Karyas\Pages\EditKarya;
use App\Filament\Resources\Karyas\Pages\ListKaryas;
use App\Filament\Resources\Karyas\Schemas\KaryaForm;
use App\Filament\Resources\Karyas\Tables\KaryasTable;
use App\Models\Karya;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class KaryaResource extends Resource
{
    protected static ?string $model = Karya::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return KaryaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KaryasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListKaryas::route('/'),
            'create' => CreateKarya::route('/create'),
            'edit' => EditKarya::route('/{record}/edit'),
        ];
    }
}
