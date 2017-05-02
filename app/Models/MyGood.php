<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyGood extends Model
{
    protected $table = 'my_goods';

    protected $guarded = ['id'];


    public function ware()
    {
        return $this->hasOne(Ware::class,'id','ware_id');
    }

}