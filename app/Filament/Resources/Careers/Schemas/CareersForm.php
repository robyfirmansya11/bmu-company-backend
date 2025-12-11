<?php

namespace App\Filament\Resources\Careers\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms;
use Filament\Forms\Form;

class CareersForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Forms\Components\TextInput::make('title')
                ->label('Judul Pekerjaan')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('slug')
                ->label('Slug (otomatis dari judul)')
                ->unique(ignoreRecord: true)
                ->maxLength(255),

            Forms\Components\TextInput::make('location')
                ->label('Lokasi')
                ->placeholder('Contoh: Morowali, Sulawesi Tengah'),

            Forms\Components\Select::make('type')
                ->label('Tipe Pekerjaan')
                ->options([
                    'Full-time' => 'Full-time',
                    'Part-time' => 'Part-time',
                    'Contract' => 'Contract',
                    'Internship' => 'Internship',
                ]),

            Forms\Components\FileUpload::make('image')
                ->label('Gambar/Poster')
                ->image()
                ->directory('careers'),

            Forms\Components\Textarea::make('description')
                ->label('Deskripsi Pekerjaan')
                ->rows(5),

            Forms\Components\Repeater::make('requirements')
                ->label('Kualifikasi')
                ->schema([
                    Forms\Components\TextInput::make('item')
                        ->label('Syarat')
                        ->maxLength(255),
                ])
                ->addActionLabel('Tambah Syarat')
                ->collapsible(),

            Forms\Components\DateTimePicker::make('published_at')
                ->label('Tanggal Publikasi')
                ->default(now()),

   /*          Forms\Components\TextInput::make('meta_title')
                ->label('Meta Title')
                ->maxLength(255),

            Forms\Components\Textarea::make('meta_description')
                ->label('Meta Description')
                ->rows(3), */
        ]);
    }
}
