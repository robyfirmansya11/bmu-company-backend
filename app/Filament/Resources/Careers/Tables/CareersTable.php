<?php

namespace App\Filament\Resources\Careers\Tables;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions; // ✅ Ini yang benar, bukan Tables\Actions

class CareersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('location')
                    ->label('Lokasi')
                    ->sortable(),

                Tables\Columns\TextColumn::make('type')
                    ->label('Tipe'),

                Tables\Columns\TextColumn::make('published_at')
                    ->label('Publikasi')
                    ->date(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->sortable(),
            ])
            ->recordActions([
                Actions\ViewAction::make(),
                Actions\EditAction::make(),
                Actions\DeleteAction::make(),
            ]);
    }
}
