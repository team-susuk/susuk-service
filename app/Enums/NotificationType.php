<?php
namespace App\Enums;

enum NotificationType: string
{
    case Information = "information";
    case Blast = "blast";

    public function label(): string
    {
        return str($this->name)->replace('_', ' ')->title()->__toString();
    }

}
