<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affectation extends Model
{
    use HasFactory;
    protected $fillable=['user_id','courrier_id','reponse','duree_reponse'];
    public function users(){
        return $this->belongsTo(User::class);
     }
     public function courriers(){
        return $this->belongsTo(Courrier::class);
     }
}
