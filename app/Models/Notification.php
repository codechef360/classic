<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    public function getNotifiableUser(){
        return $this->belongsTo(Customer::class, 'notifiable_id');
    }
}
