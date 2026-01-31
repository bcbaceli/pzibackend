<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable=['image','name','address_id','square','amenities','number_of_guests','price','owner_id'];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }
}
