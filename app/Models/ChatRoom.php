<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{
    protected $fillable = [
        'name', 'create_user', 'member_list', 'black_list', 'type'
    ];

    protected $casts = [
        'member_list' => 'json',
        'black_list' => 'json'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function chatContent()
    {
        return $this->hasMany(ChatContent::class);
    }
}
