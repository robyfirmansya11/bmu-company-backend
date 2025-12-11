<?php

namespace App\Filament\Resources\Careers\Schemas;

use Filament\Schemas\Schema;
use Filament\Infolists;

class CareersInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Infolists\Components\TextEntry::make('title')->label('Judul'),
            Infolists\Components\TextEntry::make('location')->label('Lokasi'),
            Infolists\Components\TextEntry::make('type')->label('Tipe'),
            Infolists\Components\ImageEntry::make('image')->label('Gambar'),
            Infolists\Components\TextEntry::make('description')->label('Deskripsi'),
            Infolists\Components\TextEntry::make('published_at')->label('Tanggal Publikasi'),
        ]);
    }
}
