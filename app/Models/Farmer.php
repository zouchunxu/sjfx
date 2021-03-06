<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Farmer extends Model
{
    use SoftDeletes;

    protected $table = 'farmers';

    protected $guarded = ['id'];

    public function ware()
    {
        return $this->hasOne(Ware::class,'id','ware_id');
    }
}