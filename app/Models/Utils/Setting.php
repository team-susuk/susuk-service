<?php
namespace App\Models\Utils;


use Illuminate\Database\Eloquent\Model;
use Laililmahfud\Adminportal\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory, HasUuid;

    protected $table = "settings";
    protected $guarded = [];
}
