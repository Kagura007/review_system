<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // 「この4つの項目は、まとめてデータ登録して良い」というLaravelへの許可
    protected $fillable = [
        'user_id',
        'parent_id',
        'comment',
        'evaluation'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
