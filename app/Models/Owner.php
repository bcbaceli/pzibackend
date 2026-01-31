<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $fillable = ['first_name','last_name','phone','email','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function apartments()
    {
        return $this->hasMany(Apartment::class);
    }
}
