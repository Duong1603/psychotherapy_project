<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkGoogleMeet extends Model
{
    use HasFactory;
    public function order()
    {
       $this->hasOne(Order::class);
    }
}
