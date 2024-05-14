<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lost extends Model
{
    use HasFactory;
    protected $fillable = ['descripcion','photo', 'departamento', 'cargo', 'date of foud','personals_id', 'rooms_id' ];

public function personals(){
    return $this->belongsTo(Personal:: class, 'personals_id' );
}
public function rooms(){
    return $this->belongsTo(room:: class, 'rooms_id');
}



}



