<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    // protected $table = 'order_review';
    protected $fillable=['order_detail_id','star_rating','review','book_id'];

    public function orderDetail(){
        return $this->belongsTo(OrderDetail::class);
    }
}
