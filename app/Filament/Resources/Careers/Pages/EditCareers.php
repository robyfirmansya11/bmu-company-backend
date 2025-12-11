<?php

namespace App\Filament\Resources\Careers\Pages;

use App\Filament\Resources\Careers\CareersResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditCareers extends EditRecord
{
    protected static string $resource = CareersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
