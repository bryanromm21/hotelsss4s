<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;
    protected $fillable =['name','last_name','age','birthdate','CI','sex','email','emergency_contac','positions_id'];
    public function positions(){
        return $this->belongsTo(position::class, 'positions_id');
    }
    public function activities(){
        return $this->hasMany(activity::class, 'id');
    }
    public function Lost () {
        return $this->hasMany(Lost::class, 'id');
    }
    public function LostReports () {
        return $this->hasMany(LostReports::class, 'id');
    }
   
}


