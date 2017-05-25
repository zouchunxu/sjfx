<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMapLog extends Model
{
    protected $table = 'user_map_log';

    protected $fillable = ['uid', 'open_id'];

    public static function getSuperUid($openId)
    {
        return self::query()->where('open_id',$openId)->first(['uid'])->value('uid');
    }

}