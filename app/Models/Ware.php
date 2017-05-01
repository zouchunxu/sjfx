<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ware extends Model
{
    use SoftDeletes;

    protected $table = 'wares';

    protected $guarded = ['id'];


    public function getCategory()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function getTraitAttribute($value)
    {
        return json_decode($value,true);
    }

}