<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fichier extends Model
{
    use HasFactory;
    protected $fillable=[ 'chemin' ];
    public function courriers(){
        return $this->hasMany(courrier::class);
    }
}
