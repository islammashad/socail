<?php

namespace VoiceBook;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'from_user_id',
        'to_user_id',
        'body',
    ];

    /**
     * Message sender.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function from()
    {
        return $this->hasOne('VoiceBook\User', 'id', 'from_user_id');
    }

    /**
     * Message recipient.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function to()
    {
        return $this->hasOne('VoiceBook\User', 'id', 'to_user_id');
    }
}
