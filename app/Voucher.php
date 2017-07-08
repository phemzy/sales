<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    //
    public function owner()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function recipient()
    {
    	return $this->belongsTo(User::class, 'recipient_id');
    }
}
