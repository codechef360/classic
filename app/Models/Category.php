<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function getSubCategories(){
        return $this->hasMany(SubCategory::class, 'category_id');
    }

    public function getAllAd(){
        return $this->belongsTo(Ad::class, 'advert_id');
    }
}
