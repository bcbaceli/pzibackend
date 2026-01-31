<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['street','town','postal_code','country'];

    public function apartments()
    {
        return $this->hasMany(Apartment::class);
    }

    public function guests()
    {
        return $this->hasMany(Guest::class);
    }
}
