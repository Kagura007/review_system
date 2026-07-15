<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    // 「この項目は、まとめてデータ登録して良い」というLaravelへの許可
    protected $fillable = [
        'id',
        'user_id',
        'file_name',
        'nick_name',
        'description'
    ];
}
