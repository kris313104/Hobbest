<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class ChatController extends Controller
{

    public function showChat($id)
    {
        $user = User::findOrFail($id);
        $name = $user['name'];
        $auth_id = auth()->user()->id;
        $chats = Chat::getChats($auth_id);
        $allowed = array();
        foreach ($chats as $key => $data) {
            array_push($allowed, $data['sender_id']);
        }
        if (in_array($id, $allowed)) {
            $sender_chat_id = Chat::getChatId(auth()->user()->id, $id);
            $receiver_chat_id = Chat::getChatId($id, auth()->user()->id);
            Message::readMessages($auth_id, $id);
            $messages = Message::getMessages($auth_id, $id);
            return view('layouts.chat', ['id' => $id,'name' => $name, 'sender_chat_id' => $sender_chat_id[0]->id,'receiver_chat_id' => $receiver_chat_id[0]->id, 'messages' => $messages]);
        } else {
            return redirect('/404');
        }
    }

    public function sendMessage($id)
    {
        if (isset($_POST['message'])) {
            $auth_id = auth()->user()->id;
            $message = $_POST['message'];
            if ($message != '') {
                Message::createMessage($auth_id, $id, $message);
                return redirect('/app/chat/'.$id);
            } else return redirect('/app/chat/'.$id)->with('flash_message_error', 'fail');
        }
    }
}
