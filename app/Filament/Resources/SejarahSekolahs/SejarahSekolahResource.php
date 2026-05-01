<?php

namespace App\Filament\Resources\SejarahSekolahs;

use App\Filament\Resources\SejarahSekolahs\Pages\CreateSejarahSekolah;
use App\Filament\Resources\SejarahSekolahs\Pages\EditSejarahSekolah;
use App\Filament\Resources\SejarahSekolahs\Pages\ListSejarahSekolahs;
use App\Filament\Resources\SejarahSekolahs\Schemas\SejarahSekolahForm;
use App\Filament\Resources\SejarahSekolahs\Tables\SejarahSekolahsTable;
use App\Models\SejarahSekolah;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SejarahSekolahResource extends Resource
{
    protected static ?string $model = SejarahSekolah::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-building-library';
    
    protected static ?string $navigationLabel = '🏛️ Sejarah Sekolah';
    
    protected static ?string $navigationGroup = 'Konten';

    protected static ?string $recordTitleAttribute = 'judul';

    public static function form(Schema $schema): Schema
    {
        return SejarahSekolahForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SejarahSekolahsTable::configure($table);
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
            'index' => ListSejarahSekolahs::route('/'),
            'create' => CreateSejarahSekolah::route('/create'),
            'edit' => EditSejarahSekolah::route('/{record}/edit'),
        ];
    }
}
