<?php

use Filament\Support\Contracts\HasDescription;
use Filament\Support\Contracts\HasLabel;
 
enum Status: string implements HasLabel, HasDescription
{
    case Sepatu = 'sepatu';
    case Celana = 'celana';
    case Baju = 'baju';

    public function getLabel(): ?string
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        return match ($this) {
            self::Sepatu => 'Kategori untuk sepatu.',
            self::Celana => 'Kategori untuk celana.',
            self::Baju => 'Kategori untuk baju.',
        };
    }
}
