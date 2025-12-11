<?php

namespace App\Filament\Resources\Careers;

use App\Filament\Resources\Careers\Pages\CreateCareers;
use App\Filament\Resources\Careers\Pages\EditCareers;
use App\Filament\Resources\Careers\Pages\ListCareers;
use App\Filament\Resources\Careers\Pages\ViewCareers;
use App\Filament\Resources\Careers\Schemas\CareersForm;
use App\Filament\Resources\Careers\Schemas\CareersInfolist;
use App\Filament\Resources\Careers\Tables\CareersTable;
use App\Models\Careers;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CareersResource extends Resource
{
    protected static ?string $model = Careers::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return CareersForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CareersInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CareersTable::configure($table);
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
            'index' => ListCareers::route('/'),
            'create' => CreateCareers::route('/create'),
            'view' => ViewCareers::route('/{record}'),
            'edit' => EditCareers::route('/{record}/edit'),
        ];
    }
}
