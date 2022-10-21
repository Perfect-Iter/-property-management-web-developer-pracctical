<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = ['name','categoryid','owner', 'no_of_rooms', 'no_of_bathrooms','location','status'];

    public function leases()
    {
        return $this->hasMany(Lease::class);
    }

}
