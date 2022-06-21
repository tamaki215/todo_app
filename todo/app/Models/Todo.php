<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    //論理削除を行えるようにする
    use SoftDeletes;

    protected $guarded = ['id','created_at','updated_at','deleted_at'];
}
