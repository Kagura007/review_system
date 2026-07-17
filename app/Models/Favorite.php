<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Post;


class Favorite extends Model
{
    protected $fillable = [
        'user_id',
        'post_id'
    ];

    // このFavoriteが属しているPostモデルを取得する
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    // 誰がお気に入り登録をしたか
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
