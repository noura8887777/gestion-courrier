<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    use HasFactory;
    public function utilisateurs(){
       return $this->hasMany(utilisateur::class,"role_id");
    }
}
