<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getCustomerAdverts(){
        return $this->hasMany(Ad::class, 'customer_id');
    }
    public function getCustomerWatchlist(){
        return $this->hasMany(AdsWatchList::class, 'advertised_by');
    }
    public function getMyWatchlist(){
        return $this->hasMany(AdsWatchList::class, 'customer_id');
    }
    public function getSingleWatchlist(){
        return $this->belongsTo(Wishlist::class, 'product_id');
    }
    public function getCustomerReviews(){
        return $this->hasMany(AdsReview::class, 'advertised_by');
    }

    public function getMyMessages(){
        return $this->hasMany(Message::class, 'to_id');
    }
    public function getNotifications(){
        return $this->hasMany(Notification::class, 'notifiable_id');
    }

     public function getRegisteredBy(){
        return $this->belongsTo(User::class, 'registered_by');
    }

    public function getLocation(){
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function getArea(){
        return $this->belongsTo(Area::class, 'area_id');
    }
    /* public function getRatings(){
        return $this->hasMany(Ad::class, 'customer_id');
    }
    public function getCustomerAdverts(){
        return $this->hasMany(Ad::class, 'customer_id');
    } */
}
