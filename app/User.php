<?php

namespace App;

use App\Events\UserCreated;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'first_name', 'last_name', 'plan', 'referred_by', 'affiliate_id', 'order_count', 'flash_sale_user'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $events = ['created' => UserCreated::class];

    public function updatePlan()
    {
        $this->plan = 1;
        $this->save();
    }

    public function isFlashSaleUser()
    {
        return $this->flash_sale_user == true;
    }

    public function vouchers()
    {
        return $this->hasMany(Voucher::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function plans()
    {
        return $this->belongsTo(Plan::class, 'plan');
    }

    public function hasPaid()
    {
        $p = $this->payments()->where('status', 'successful')->where('type', 'Sales Registration Fee')->first();

        return $p ? true : false;
    }

    public function hasCompletedProfile()
    {
        return (bool) $this->complete == true;
    }

    public function isBlocked()
    {
        return $this->blocked == true;
    }

    public function block()
    {
        $this->blocked = true;
        $this->save();
    }

    public function unblock()
    {
        $this->blocked = false;
        $this->save();
    }

    public function completeProfile()
    {
        $this->complete = true;
        $this->save();

        return true;
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function markets()
    {
        return $this->belongsToMany(Market::class);
    }

    public function getMarketsAttribute()
    {
        return $this->markets()->get();
    }

    public function fullname(){
        $name = $this->first_name . ' ' . $this->last_name;

        return $name != ' ' ? $name : $this->username;
    }

    public function hasjoined(\App\Market $market)
    {
        return (bool) in_array($market->id, $this->markets()->pluck('market_id')->toArray());
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function account()
    {
        return $this->hasOne(Account::class);
    }

    public function logins()
    {
        return $this->hasMany(Authify::class);
    }

    public function hasEmptyTransactions()
    {
        return (bool) $this->transactions->count();
    }

    public function hasTransactions()
    {
        return (bool) $this->transactions->count();
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
