<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Help_Chat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HelpChatController extends Controller
{
    public function index(Request $request, $userId)
    {
        $user = Auth::user()->roles->first()->name;
        if ($user == "Admin") {
            $userChats = Help_Chat::where('sender_id', $userId)
                ->orWhere('receiver_id', $userId)
                ->get();

            // Filter out chats with managers
            $userManagerChats = $userChats->filter(function ($chat) {
                $sender = User::find($chat->sender_id);
                $receiver = User::find($chat->receiver_id);
                return $sender->role == 'manager' || $receiver->role == 'manager';
            });

            return response()->json($userManagerChats);
            $message = Help_Chat::where('sender_id', Auth::user()->id)->get();
        } else {
            
        }
    }
}
