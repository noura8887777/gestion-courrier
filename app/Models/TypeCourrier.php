<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeCourrier extends Model
{
    use HasFactory;
    protected $fillable=['nom_type'];
    public function courriers(){
        return $this->hasMany(courrier::class);
    }

}
