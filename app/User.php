<?php

namespace VoiceBook;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'birthday',
        'location',
        'phone',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'username';
    }

    /**
     * Get the posts for the user.
     *
     * @return HasMany
     */
    public function posts()
    {
        return $this->hasMany('VoiceBook\Post');
    }

    /**
     * Get the followers for the user.
     *
     * @return HasMany
     */
    public function followers()
    {
        return $this->belongsToMany(
            'VoiceBook\User',
            'follows',
            'followee_id',
            'follower_id'
        )->withTimestamps();
    }

    /**
     * Get the followees for the user.
     *
     * @return HasMany
     */
    public function followees()
    {
        return $this->belongsToMany(
            'VoiceBook\User',
            'follows',
            'follower_id',
            'followee_id'
        )->withTimestamps();
    }

    public function comments() {
       return $this->hasMany('VoiceBook\Comment');
   }

    /**
     * Get the liked posts.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function likedPosts()
    {
        return $this->morphedByMany('VoiceBook\Post', 'likeable');
    }

    /**
     * Outbox of the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function outbox()
    {
        return $this->hasMany('VoiceBook\Message', 'from_user_id', 'id');
    }

    /**
     * Inbox of the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inbox()
    {
        return $this->hasMany('VoiceBook\Message', 'to_user_id', 'id');
    }
}
