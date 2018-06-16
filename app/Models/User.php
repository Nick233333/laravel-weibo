<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPassword;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'uuid',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $table = 'users';

    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->activation_token = str_random(30);
        });
    }

    /**
     * @param string $size
     * @return string
     */
    public function gravatar($size = '60')
    {
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "https://www.gravatar.com/avatar/$hash?s=$size";
    }

    /**
     * @param string $token
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function statuses()
    {
        return $this->hasMany(Status::class);
    }

    /**
     * @return mixed
     */
    public function feed()
    {
        $user_ids = Auth::user()->followings->pluck('id')->toArray();
        array_push($user_ids, Auth::user()->id);
        return Status::whereIn('user_id', $user_ids)
                ->with('user')
                ->orderBy('created_at', 'desc');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followers()
    {
        return $this->belongsToMany(User::Class, 'followers', 'user_id', 'follower_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followings()
    {
        return $this->belongsToMany(User::Class, 'followers', 'follower_id', 'user_id');
    }

    /**
     * @param $user_ids
     */
    public function follow($user_ids)
    {
        if (!is_array($user_ids)) {
            $user_ids = compact('user_ids');
        }
        $this->followings()->sync($user_ids, false);
    }

    /**
     * @param $user_ids
     */
    public function unfollow($user_ids)
    {
        if (!is_array($user_ids)) {
            $user_ids = compact('user_ids');
        }
        $this->followings()->detach($user_ids);
    }

    /**
     * @param $user_id
     * @return mixed
     */
    public function isFollowing($user_id)
    {
        return $this->followings->contains($user_id);
    }
}
