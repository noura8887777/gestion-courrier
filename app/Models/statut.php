<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statut extends Model
{
    use HasFactory;
    protected $fillable=['nom_statut'];
    public function courriers(){
        return $this->hasMany(Courrier::class);
    }
}
