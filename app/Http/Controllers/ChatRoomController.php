<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChatRoomRequest;
use Illuminate\Http\Request;

class ChatRoomController extends Controller
{
    public function roomList(Request $request)
    {
        $user = $request->user();
        return view('chat.room_list', [
            'pub_room' => $user->chatRoom()->where('type', 1)->get(),
            'pri_room' => $user->chatRoom()->where('type', 2)->get(),
            'non_room' => $user->chatRoom()->where('type', 3)->get(),
        ]);
    }

    public function roomCreate(ChatRoomRequest $request)
    {
        $request->user()->chatRoom()->create(
            $request->only(['name', 'type'])
        );
        return redirect()->route('chat.room_list');
    }

    public function roomShow()
    {

    }
}
