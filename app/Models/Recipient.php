<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipient extends Pivot
{
    use HasFactory, SoftDeletes;

    public $timestamps = false;

    protected $casts = [
        'read_at' => 'datetime',
    ];

    // Relation With Conversation
    public function message()
    {
        return $this->belongsTo(Message::class);
    }

    // Relation With User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
