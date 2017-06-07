<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trade extends Model
{
    use SoftDeletes;

    protected $table = 'trade';

    protected $fillable = ['uid','id','open_id','price','deleted_at','created_at','updated_at'];


}