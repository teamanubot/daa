<?php

namespace App\Filament\Admin\Resources\DepartemenResource\Pages;

use App\Filament\Admin\Resources\DepartemenResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDepartemen extends EditRecord
{
    protected static string $resource = DepartemenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
