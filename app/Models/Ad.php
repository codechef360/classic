<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    public function getCustomer(){
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function getCategory(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function getSubCategory(){
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }
    public function getLocation(){
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function getAdComments(){
        return $this->hasMany(AdComment::class, 'advert_id');
    }
    public function getAdvertReviews(){
        return $this->hasMany(AdsReview::class, 'advert_id');
    }
    public function getViews(){
        return $this->hasMany(AdsView::class, 'ads_id');
    }
    public function getMyWatchlist(){
        return $this->hasMany(AdsWatchList::class, 'customer_id');
    }

    public function getGalleryImages(){
        return $this->hasMany(AdsGallery::class, 'ads_id');
    }

    public function getCategories(){
        return $this->hasMany(Category::class, 'category_id');
    }

       public function getPackage(){
        return $this->belongsTo(Package::class,'package_id');
    }

      public function getAdViews(){ //this method is used in admin
        return $this->hasMany(AdsView::class, 'ads_id');
    }


}
