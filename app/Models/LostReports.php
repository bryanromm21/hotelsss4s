<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LostReports extends Model
{
    use HasFactory;
    protected $fillable = ['departamento', 'cargo', 'destinatario', 'descripcion', 'date of foud','photo', 'personals_id', 'rooms_id' ];

    public function personals(){
        return $this->belongsTo(Personal :: class, 'personals_id' );
    }
    public function rooms(){
        return $this->belongsTo(room:: class, 'rooms_id');
    }

}
