<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ChatContentController extends Controller
{
    public function main()
    {
        return view('chat.main');
    }

    public function getTalk(Request $request)
    {
        $table = $request->get('room');
        $data = Redis::hGetAll($table);
        ksort($data);
        $str = '';
        if ($data) {
            foreach ($data as $value) {
                $arr = unserialize($value);
                $str.="<p><h3>{$arr['username']}:&nbsp;&nbsp;".date('Y-m-d H:i:s',$arr['pubtime'])
                    ."</h3>{$arr['content']}</p>";
            }
        }
        return response()->json(['status' => 'ok', 'content' => $str]);
    }

    public function save(Request $request)
    {
        $data = $request->all();
        $key = Redis::hlen($data['room']);
        $info = [
            'userid'  => $data['userid'],
            'username'=> $data['username'],
            'content' => $data['content'],
            'pubtime' => time()
        ];
        $re = Redis::hset($data['room'],$key,serialize($info));
        if($re) {
            echo 'ok';
        } else {
            echo 'failed';
        }
    }

    public function delete($table)
    {
        dump('聊天结束');
        $a = Redis::del($table);
        dd($a);
    }
}
