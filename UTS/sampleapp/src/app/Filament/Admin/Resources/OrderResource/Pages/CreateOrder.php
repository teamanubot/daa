<?php

namespace App\Filament\Admin\Resources\OrderResource\Pages;

use App\Models\Product;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Admin\Resources\OrderResource;
use Illuminate\Support\Facades\Log;

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['total_price'] = 0;
        $orderItems = $data['orderItems'] ?? [];

        foreach ($orderItems as $itemData) {
            $product = Product::find($itemData['product_id']);
            if ($product) {
                $data['total_price'] += $product->price * $itemData['quantity'];
            }
        }

        log::info("Calculated Total Price in mutateFormDataBeforeCreate: {$data['total_price']}");
        return $data;
    }

}