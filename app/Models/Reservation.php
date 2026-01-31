<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['guest_id','apartment_id','number_of_guests','start_date','end_date','total_price'];

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }
}
