<?php

namespace App\Models;

use Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'genre',
        'price',
        'quantity',
        'status',
    ];

    protected $appends = ['genre_name','rating_total'];

    public function getGenreNameAttribute()
    {
        $value = $this->genre;
        switch ($value) {
            case 0:
                return 'Fiction';
                break;
            case 1:
                return 'Non-Fiction';
                break;
            case 2:
                return 'Science Fiction';
                break;
            default:
                return 'Unknown';
        }
    }
    public function getStatusAttribute($value)
    {
        return $value != 1 ? 'outOfStock' : 'Available';
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function getRatingTotalAttribute()
    {
        if($this->reviews){
            $ratingCount = $this->reviews->count();
            
            if($ratingCount > 0){
                $totalRating = $this->reviews->sum('star_rating');
                $rating =  $totalRating / $ratingCount;
                return $ratingCount;
            }
        }
    }

}
