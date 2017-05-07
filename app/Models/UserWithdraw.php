<?php
namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserWithdraw extends Model
{
    use SoftDeletes;

    protected $table = 'user_withdraw';

    protected $guarded = ['id'];

    public function user()
    {
        return $this->hasOne(User::class,'uid','uid');
    }


}