<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courrier extends Model
{
    use HasFactory;
    protected $fillable=['date','num_order_annuel','date_lettre','num_lettre','designation_destinataire'
    ,'analyse_affaire','date_reponse', 'num_reponse','user_id','statut_id','fichier_id','type_courrier_id'];
    public function users(){
        return $this->belongsTo(User::class);
    }
    public function fichiers(){
        return $this->belongsTo(Fichier::class);
    }
    public function statuts(){
        return $this->belongsTo(Statut::class);
    }
    public function type_courriers(){
        return $this->belongsTo(TypeCourrier::class);
    }
    public function affectations(){
       return $this->hasMany(Affectation::class);
    }
}
