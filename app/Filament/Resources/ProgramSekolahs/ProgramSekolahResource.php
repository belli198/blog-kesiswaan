<?php

namespace App\Filament\Resources\ProgramSekolahs;

use App\Filament\Resources\ProgramSekolahs\Pages\CreateProgramSekolah;
use App\Filament\Resources\ProgramSekolahs\Pages\EditProgramSekolah;
use App\Filament\Resources\ProgramSekolahs\Pages\ListProgramSekolahs;
use App\Filament\Resources\ProgramSekolahs\Schemas\ProgramSekolahForm;
use App\Filament\Resources\ProgramSekolahs\Tables\ProgramSekolahsTable;
use App\Models\ProgramSekolah;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class ProgramSekolahResource extends Resource
{
    protected static ?string $model = ProgramSekolah::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationLabel = '📋 Program Sekolah';

    protected static \UnitEnum|string|null $navigationGroup = 'Konten';

    protected static ?string $recordTitleAttribute = 'nama_program';

    public static function form(Schema $schema): Schema
    {
        return ProgramSekolahForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProgramSekolahsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProgramSekolahs::route('/'),
            'create' => CreateProgramSekolah::route('/create'),
            'edit' => EditProgramSekolah::route('/{record}/edit'),
        ];
    }
}
