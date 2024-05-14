<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $fillable =['positions'];
    public function personals(){
        return $this->hasMany(Personal::class, 'id');
    }
}
