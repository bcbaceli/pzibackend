<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = ['first_name','last_name','phone','user_id','address_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
