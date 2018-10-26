<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChatRoomRequest;
use App\Models\ChatRoom;
use App\Models\User;
use Illuminate\Http\Request;

class ChatRoomController extends Controller
{
    public function roomList(Request $request)
    {
        $data['pub_room'] = ChatRoom::where('type', 1)->orderByDesc('created_at')->get();
        $data['pri_room'] = ChatRoom::where('type', 2)->orderByDesc('created_at')->get();
        $data['non_room'] = ChatRoom::where('type', 3)->orderByDesc('created_at')->get();

        return view('chat.room_list', $data);
    }

    public function roomCreate(ChatRoomRequest $request)
    {
        $request->user()->chatRoom()->create(
            $request->only(['name', 'type'])
        );
        return redirect()->route('chat.room_list');
    }

    public function roomMain(ChatRoom $chatRoom, Request $request)
    {
        $user = $request->user();
        $memberList = $chatRoom->member_list;
        $memberArr = [];
        if (is_null($memberList)) {
            $memberArr[] = $user->id;
        } else {
            $memberArr = json_decode($memberList);
            if (!in_array($user->id, $memberArr)) {
                $memberArr[] = $user->id;
            }
        }
        $chatRoom->update(['member_list' => json_encode($memberArr)]);
        $users = User::whereIn('id', $memberArr)->get();

        return view('chat.room_main')->with([
            'users' => $users,
            'chatRoom' => $chatRoom
        ]);
    }
}
