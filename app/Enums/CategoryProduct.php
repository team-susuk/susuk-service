<?php
namespace App\Enums;

enum CategoryProduct: string
{
    case Favorite_Product = "favorite_product";
    case Special_This_Month = "special_this_month";

    public function label(): string
    {
        return str($this->name)->replace('_', ' ')->title()->__toString();
    }
}