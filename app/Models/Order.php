<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    protected $fillable = ['start_meeting','end_meeting','problem'];

    public function type()
    {
        return $this->belongsTo(Package::class, 'package_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function link()
    {
        return $this->belongsTo(LinkGoogleMeet::class, 'link_google_meet_id', 'id');
    }
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    public function scopeNewest($query)
    {
        return $query->orderBy('created_at','DESC');
    }
    
    // public function checkBookBeforeSave($start,$end)
    // {
        
    // }
}
