<?php
namespace App\Enums;

enum CategoryMerchant: string
{
    case Top_Merchant = "top_merchant";
    case New_Merchant = "new_merchant";

    public function label(): string
    {
        return str($this->name)->replace('_', ' ')->title()->__toString();
    }

}
