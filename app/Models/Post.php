<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    // 「この4つの項目は、まとめてデータ登録して良い」というLaravelへの許可
    protected $fillable = [
        'user_id',
        'parent_id',
        'comment',
        'evaluation'
    ];

    // 投稿ユーザとのリレーション
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // コメント降順３件まで
    public function reply(): HasMany
    {
        return $this->hasMany(Post::class, 'parent_id')
            ->latest()
            ->limit(3);
    }
}
