<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    use HasFactory;
    protected $fillable =['rooms','rooms_number','rooms_price','rooms_type','capacity','state'];
    public function activities(){
        return $this->hasMany(activity::class, 'id');
    }
    public function Lost () {
        return $this->hasMany(Lost::class, 'id');
    }
    public function LostReports () {
        return $this->hasMany(LostReports::class, 'id');
    }
    protected $casts =[
        'rooms_type'  => 'array',
        'state'  => 'array',
    ];
}
