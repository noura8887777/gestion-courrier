<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courrier extends Model
{
    use HasFactory;
    protected $fillable=['date','num_order_annuel','date_lettre','num_lettre','designation_destinataire'
    ,'analyse_affaire','date_reponse', 'num_reponse','utilisateur_id','statut_id','fichier_id','type_courrier_id'];
    public function utilisateurs(){
        return $this->belongsTo(utilisateur::class,"utilisateur_id");
    }
    public function fichiers(){
        return $this->belongsTo(fichier::class);
    }
    public function statuts(){
        return $this->belongsTo(statut::class);
    }
    public function type_courriers(){
        return $this->belongsTo(TypeCourrier::class);
    }
    public function affectations(){
       return $this->hasMany(affectation::class);
    }
}
