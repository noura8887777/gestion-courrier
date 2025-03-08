<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class utilisateur extends Model
{
    use HasFactory;
    protected $fillable=['nom','email','password','role_id'];
    public function roles(){    
        return $this->belongsTo(role::class);
    }
    public function courriers(){
        return $this->hasMany(courrier::class);
    }
    public function affectations(){
        return $this->hasMany(affectation::class);
     }
}
