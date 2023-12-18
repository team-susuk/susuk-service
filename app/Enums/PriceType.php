<?php
namespace App\Enums;

enum PriceType: string
{
     case Guide_Show_Merchant = "guide_show_merchant";
     case Merchant_Show_Guide = "merchant_show_guide";
     case Merchant_Top_Ads = "merchant_top_ads";
     case Product_Top_Ads = "product_top_ads";
     case Top_Merchant = "top_merchant";
     case New_Merchant = "new_merchant";
     case Special_This_Month = "special_this_month";
     case Ads_Banner = "ads_banner";
     case Blast_Merchant = "blast_merchant";
     case Blast_Product = "blast_product";
     case Favorite_Product = "favorite_product";
     case Add_Product = "add_product";

     public function label(): string
     {
          return str($this->name)->replace('_', ' ')->title()->__toString();
     }

}
