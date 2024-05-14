<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activity extends Model
{
    use HasFactory;
    protected $fillable =['date_activities','description','state','personals_id','rooms_id'];
    public function personals(){
        return $this->belongsTo(personal::class, 'personals_id');
    }
    public function rooms(){
        return $this->belongsTo(room::class, 'rooms_id');
    }
    protected $casts =[
        
        'state'  => 'array',
    ];
}
