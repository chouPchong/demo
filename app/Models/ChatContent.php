<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatContent extends Model
{
    protected $fillable = [
        'temp_name', 'content'
    ];

    public function chatRoom()
    {
        return $this->belongsTo(ChatRoom::class);
    }
}
