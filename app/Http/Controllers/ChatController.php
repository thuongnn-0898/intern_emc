<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Pusher\Pusher;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function send(Request $request)
    {
        $options = array(
            'cluster' => 'ap1',
            'encrypted' => true
        );
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );
        $user = Auth::user();
        $message = $request->msg;
        $time = \Carbon\Carbon::now()->toTimeString();
        $view = View::make('_item_chat', compact('user', 'message', 'time'))->render();

        $data = [
            'item'=> $view,
            'user' => $user,
        ];
        $pusher->trigger('chat.room', '.chat.message', $data);

        return response()->json(['status' => true]);
    }
}
