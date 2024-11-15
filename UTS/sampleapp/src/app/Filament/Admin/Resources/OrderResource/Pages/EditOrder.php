<?php

namespace App\Filament\Admin\Resources\OrderResource\Pages;

use App\Filament\Admin\Resources\OrderResource;
use Filament\Actions;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Resources\Pages\EditRecord;

class EditOrder extends EditRecord
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $validStatuses = ['pending', 'processing', 'completed', 'cancelled'];

        $status = $data['status'] ?? 'pending';

        if (!in_array($status, $validStatuses)) {
            throw new \Exception("Invalid status value.");
        }

        return [
            'status' => $status,
        ];
    }

}