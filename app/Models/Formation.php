<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;
    protected $table = 'formations';
    protected $fillable = ['nom', 'presentation','duree','description', 'prix', 'image','type','user_id'];

    public function categories(){
        return $this->belongsToMany(Categorie::class,'formations_categories','formation','categorie');
    }
    public function chapitres(){
        return $this->belongsToMany(Chapitre::class,'formations_chapitres','formation','chapitre');
    }
}
