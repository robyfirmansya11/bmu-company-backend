<?php

namespace App\Filament\Resources\News\Pages;

use App\Filament\Resources\News\NewsResource;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Schemas\Schema; // ✅ v4
use Filament\Resources\Pages\ViewRecord;

class ViewNews extends ViewRecord
{
    protected static string $resource = NewsResource::class;

    public function infolist(Schema $schema): Schema // ✅ v4 correct signature
    {
        return $schema
            ->schema([
                TextEntry::make('title'),

                TextEntry::make('content')->html(),

ImageEntry::make('image')
    ->label('Image')
    ->disk('public')
    ->visibility('public'),

                TextEntry::make('published_at')
                    ->dateTime('d M Y H:i'),
            ]);
    }
}
