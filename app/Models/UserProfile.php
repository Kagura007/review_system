<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserProfile extends Model
{
    // 「この項目は、まとめてデータ登録して良い」というLaravelへの許可
    protected $fillable = [
        'user_id',
        'file_name',
        'nick_name',
        'description'
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
