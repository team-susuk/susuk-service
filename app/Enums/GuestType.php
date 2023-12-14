<?php
namespace App\Enums;

enum GuestType: string
{
    case Domestic = "domestic";
    case Foreign = "foreign";

    public function label(): string
    {
        return str($this->name)->replace('_', ' ')->title()->__toString();
    }
}