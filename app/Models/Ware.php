<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ware extends Model
{
    use SoftDeletes;

    protected $table = 'wares';

    protected $guarded = ['id'];

    public static function getWares($type)
    {
        static $_cache;
        if (empty($_cache)) {
            $types = Category::lists('type', 'id');

            $wares = self::orderBy('id', 'desc')->get();
            foreach ($wares as $ware) {
                $type = $types[$ware->category_id];
                $_cache[$type][] = $ware;
            }
        }
        return array_get($_cache, $type);


    }

    public function getCatType()
    {
        $category = $this->category;
        return $category->type;
    }


    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function getTraitAttribute($value)
    {
        return json_decode($value, true);
    }

}