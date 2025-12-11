<?php

namespace App\Filament\Resources\News\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;

class NewsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Tabs::make('News Tabs')
                ->tabs([
                    Tab::make('Content')
                        ->schema([
                            Forms\Components\TextInput::make('title')
                                ->required()
                                ->maxLength(255),

                            Forms\Components\RichEditor::make('content')
                                ->required(),

                            Forms\Components\FileUpload::make('image')
                                ->disk('public')
                                ->image()
                               ->directory('news/images')
                                ->visibility('public')
                                ->maxSize(2048)
                                ->nullable(),

                            Forms\Components\DatePicker::make('published_at')
                                ->default(now()),
                        ]),

                    Tab::make('SEO')
                        ->schema([
                            Forms\Components\TextInput::make('meta_title')
                                ->label('Meta Title')
                                ->maxLength(60),

                            Forms\Components\Textarea::make('meta_description')
                                ->label('Meta Description')
                                ->maxLength(160)
                                ->rows(3),

                            Forms\Components\TextInput::make('meta_keywords')
                                ->label('Meta Keywords')
                                ->placeholder('news, company, update'),

                                Forms\Components\TextInput::make('slug')
    ->label('Slug')
    ->disabled()
    ->columnSpanFull(),
                        ]),
                ]),
        ]);
    }
}
