<?php

namespace App\Filament\Resources\Penghargaans;

use App\Filament\Resources\Penghargaans\Pages\CreatePenghargaan;
use App\Filament\Resources\Penghargaans\Pages\EditPenghargaan;
use App\Filament\Resources\Penghargaans\Pages\ListPenghargaans;
use App\Filament\Resources\Penghargaans\Schemas\PenghargaanForm;
use App\Filament\Resources\Penghargaans\Tables\PenghargaansTable;
use App\Models\Penghargaan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PenghargaanResource extends Resource
{
    protected static ?string $model = Penghargaan::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-trophy';
    
    protected static ?string $navigationLabel = '🏆 Penghargaan Sekolah';
    
    protected static \UnitEnum|string|null $navigationGroup = 'Konten';

    protected static ?string $recordTitleAttribute = 'nama_penghargaan';

    public static function form(Schema $schema): Schema
    {
        return PenghargaanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PenghargaansTable::configure($table);
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
            'index' => ListPenghargaans::route('/'),
            'create' => CreatePenghargaan::route('/create'),
            'edit' => EditPenghargaan::route('/{record}/edit'),
        ];
    }
}
