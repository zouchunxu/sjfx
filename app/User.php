<?php

namespace App;

use EasyWeChat\Core\Exception;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = ['name', 'email', 'password'];
    protected $guarded = ['uid'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'uid';


    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function getAllGold()
    {
        return floatval($this->real_gold + $this->virtual_gold);
    }

    public function deductGold($gold)
    {
        if ($gold > $this->getAllGold()) {
            throw new Exception('金币不足！');
        }
        $realGold = $this->getRealGold();
        if ($realGold >= $gold) {
            $this->real_gold -= $gold;

        } else {
            $gold -= $realGold;
            $this->real_gold = 0;

            $this->virtual_gold -= $gold;
        }
        return $this->save();

    }


    public function getRealGold()
    {
        return $this->real_gold;
    }

    public function getVirtualGold()
    {
        return $this->virtual_gold;
    }

    public function superInfo()
    {
        return $this->hasOne(self::class,'super','uid');
    }
}
