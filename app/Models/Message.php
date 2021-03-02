<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;


    public function getMessageReplies(){
        return $this->hasMany(ReplyMessage::class, 'message_id');
    }

    public function getTo(){
        return $this->belongsTo(Customer::class, 'to_id');
    }
    public function getFrom(){
        return $this->belongsTo(Customer::class, 'from_id');
    }
}
