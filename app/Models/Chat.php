<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'receiver_id',
    ];

    public $timestamps = false;

    public static function makeChat($id, $u_id)
    {
        Chat::create([
            'sender_id' => $id,
            'receiver_id' => $u_id,
        ])->save();
    }

    public static function getChats($id){
        return Chat::select('users.name', 'chats.sender_id')
        ->join('users', 'users.id', '=', 'chats.sender_id')
        ->where('chats.receiver_id', $id)
        ->where('chats.sender_id', '!=', $id)
        ->get('users.name', 'chats.sender_id')->toArray();
    }

    public static function getChatId($sender_id, $receiver_id){
        return Chat::where('sender_id', $sender_id)
        ->where('receiver_id', $receiver_id)
        ->get('id');
    }

}
