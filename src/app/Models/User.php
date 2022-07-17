<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'screen_id',
        'profile_image',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // 誰が誰のフォロワーかを結びつける
    public function followers()
    {
        return $this->belongsToMany(self::class, 'followers', 'followed_id', 'following_id');
    }

    //　誰をフォローしているかを結びつける
    public function follows()
    {
        return $this->belongsToMany(self::class, 'followers', 'following_id', 'followed_id');
    }

    //自分以外のユーザー一覧を返す
    public function fetchAllUsers(Int $userId)
    {
        $displayUser = '5';
        return $this->Where('id', '<>', $userId)->paginate($displayUser);
    }

    // フォローする
    public function follow(Int $userId) 
    {
        return $this->follows()->attach($userId);
    }

    // フォロー解除する
    public function unFollow(Int $userId)
    {
        return $this->follows()->detach($userId);
    }

    // フォローしているか
    public function isFollowing(Int $userId):bool 
    {
        return (boolean) $this->follows()->where('followed_id', $userId)->first(['id']);
    }

    // フォローされているか
    public function isFollowed(Int $userId):bool
    {
        return (boolean) $this->followers()->where('following_id', $userId)->first(['id']);
    }
}
