<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\UserProfile;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Favorite;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    // １人のユーザーに対して複数個のデータ
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }


    // １人のユーザーに対して1個のデータ
    public function profile(): HasOne
    {
        return $this->hasOne(UserProfile::class);
    }


    // 自分をフォローしているユーザー
    public function followers(): HasMany
    {
        return $this->hasMany(Follower::class, 'user_id');
    }


    // 自分がフォローしているユーザー
    public function followings(): HasMany
    {
        return $this->hasMany(Follower::class, 'follower_id');
    }

    // ユーザーをフォローしているか確認する
    public function isFollowing($userId): bool
    {
        return $this->followings()
            ->where('user_id', $userId)
            ->exists();
    }

    // お気に入り一覧を取ってくる
    public function favorites(): HasMany
    {
        return $this->hasMany(Favorite::class);
    }

    // お気に入りしているか確認する
    public function isFavorite($postId): bool
    {
        return $this->favorites()
            ->where('post_id', $postId)
            ->exists();
    }
}
