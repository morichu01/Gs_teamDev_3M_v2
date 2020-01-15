<?php

namespace App\Http\Controllers\Ajax;
use App\Events\MessageCreated;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class ChatController extends Controller
{

  public function index4() {// 新着順にメッセージ一覧を取得

    return \App\Message::orderBy('id','desc')
    //->join('users','users.id','=','messges.user_id')
    ->get();

}

public function create(Request $request) { // メッセージを登録

   $message = \App\Message::create([
        'body' => $request->message,
        'user_id'=>Auth::user()->id,'name'=>Auth::user()->name,

    ]);
    //dd($message);
    event(new MessageCreated($message));

}  
}

