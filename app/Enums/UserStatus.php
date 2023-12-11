<?php
namespace App\Enums;

enum UserStatus: string
{
     case Waiting_Approval = "waiting_approval";
     case Rejected = "rejected";
     case Active = "active";
     case Non_Active = "non_active";
     public function label(): string
     {
          return str($this->name)->replace('_', ' ')->title()->__toString();
     }

}