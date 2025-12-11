<?php

namespace App\Filament\Resources\Careers\Pages;

use App\Filament\Resources\Careers\CareersResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCareers extends ViewRecord
{
    protected static string $resource = CareersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
