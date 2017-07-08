<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function orders()
    {
    	return $this->belongsToMany(Order::class);
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function outOfStock()
    {
    	return (bool) $this->quantity == 0;
    }
}
