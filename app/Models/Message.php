<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'read',
        'created_at',
        'chat_id',

    ];


    public $timestamps = false;

    public static function createMessage($sender_id, $receiver_id, $body){
        $chat = Chat::getChatId($sender_id, $receiver_id);
        $chat_id = $chat[0]->id;
        Message::create([
            'body' => $body,
            'read' => false,
            'created_at' => now(),
            'chat_id' => $chat_id,
        ])->save();
    }

    public static function getMessages($sender_id, $receiver_id){
        $chat = Chat::getChatId($sender_id, $receiver_id);
        $sender_chat_id = $chat[0]->id;
        $chat = Chat::getChatId($receiver_id, $sender_id);
        $receiver_chat_id = $chat[0]->id;
        return Message::where('chat_id', $sender_chat_id)
        ->orWhere('chat_id', $receiver_chat_id)
        ->orderBy('created_at', 'ASC')
        ->get();
    }

    public static function isRead($sender_id, $receiver_id){
        $chat = Chat::getChatId($receiver_id, $sender_id);
        $receiver_chat_id = $chat[0]->id;
        return Message::where('chat_id', $receiver_chat_id)
        ->orderBy('created_at', 'DESC')
        ->limit(1)
        ->get('read')->toArray();
    }

    public static function readMessages($sender_id, $receiver_id){
        $chat = Chat::getChatId($receiver_id, $sender_id);
        $receiver_chat_id = $chat[0]->id;

        Message::where('chat_id', $receiver_chat_id)->
        update(['read' => 'true']);
    }



}
