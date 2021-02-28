<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplyMessage extends Model
{
    use HasFactory;

    public function getRepliedBy(){
        return $this->belongsTo(Customer::class, 'from_id');
    }



}
