<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplyIntegralShop extends Model
{
    protected $table = 'apply_integral_shop';

    protected $guarded = ['id'];

    public function ware()
    {
        return $this->hasOne(Ware::class,'id','ware_id');
    }

}