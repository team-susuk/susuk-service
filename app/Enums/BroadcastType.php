<?php
namespace App\Enums;

enum BroadcastType: string
{
    case Text = "text";
    case Text_Image = "text_image";
    case Text_File = "text_file";

    public function label(): string
    {
        return str($this->name)->replace('_', ' ')->title()->__toString();
    }

}
