<?php
namespace App\Enums;

enum OrderStatus: string
{
    case Waiting_Payment = "waiting_payment";
    case Paid = "paid";
    case Failed = "failed";
    case Expired = "expired";

    public function label(): string
    {
        return str($this->name)->replace('_', ' ')->title()->__toString();
    }

}
