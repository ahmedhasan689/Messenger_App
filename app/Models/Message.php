<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'conversation_id',
        'user_id',
        'body',
        'type',
    ];

    /**
     * Relation With Conversation
     * MSG Belongs To Conversation
     *  */
    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }

    // Relation With User
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => __('Unknown User'),
        ]);
    }

    /**
     * Relation With Users
     * recipients => Users who received the message
     * Many To Many Relation
     */
    public function recipients()
    {
        return $this->belongsToMany(User::class, 'recipients')->withPivot([
            'read_at',
            'deleted_at',
        ]);
    }

}