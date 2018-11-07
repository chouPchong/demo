<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatContent extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'temp_name', 'content'
    ];

    public $dates = [
        'publish_at', 'storage_at'
    ];

    public function chatRoom()
    {
        return $this->belongsTo(ChatRoom::class);
    }
}
