<?php

namespace App\Filament\Admin\Resources\PayMethodResource\Pages;

use App\Filament\Admin\Resources\PayMethodResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPayMethods extends ListRecords
{
    protected static string $resource = PayMethodResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
