<?php

namespace App\Filament\Admin\Resources\PayMethodResource\Pages;

use App\Filament\Admin\Resources\PayMethodResource; // Ensure this class exists in the specified namespace
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePayMethod extends CreateRecord
{
    protected static string $resource = PayMethodResource::class;
}
