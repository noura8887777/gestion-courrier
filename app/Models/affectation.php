<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class affectation extends Model
{
    use HasFactory;
    protected $fillable=['utilisateur_id','courrier_id','reponse','duree_reponse'];
    public function utilisateurs(){
        return $this->belongsTo(utilisateur::class);
     }
     public function courriers(){
        return $this->belongsTo(courrier::class);
     }
}
