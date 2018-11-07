<?php

namespace App\Http\Controllers;

use App\Models\ChatRoom;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ChatContentController extends Controller
{
    public function store(ChatRoom $chatRoom, Request $request)
    {
        $user = $request->user();
        $user->chatContent()->attach($chatRoom, [
            'temp_name' =>  $user->name,
            'content' => $request->post('content'),
            'publish_at' => Carbon::now(),
            'storage_at' => Carbon::now(),
        ]);

        return [];
    }

}
