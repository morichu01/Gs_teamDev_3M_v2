<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Pusher\Pusher;
//use Auth;
class VideoChatController extends Controller
{
//     public function __construct() 
// {
//     $this->middleware('auth'); 
// }
    public function index5(Request $request) {   // ビデオチャットページ

        $user = $request->user();
        $others = \App\User::where('id', '!=', $user->id)->pluck('name', 'id');
        return view('video_chat.index5')->with([
            'user' => collect($request->user()->only(['id', 'name'])),
            'others' => $others
        ]);
}
public function auth(Request $request) {    // Pusherの認証

        $user = $request->user();
        $socket_id = $request->socket_id;
        $channel_name = $request->channel_name;
        $pusher = new Pusher(
            config('broadcasting.connections.pusher.key'),
            config('broadcasting.connections.pusher.secret'),
            config('broadcasting.connections.pusher.app_id'),
            [
                'cluster' => config('broadcasting.connections.pusher.options.cluster'),
                'encrypted' => true
            ]
        );
        return response(
            $pusher->presence_auth($channel_name, $socket_id, $user->id)
        );

    }
}