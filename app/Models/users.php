<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;
    protected $table = "users";
    public $timestamps = false;
    protected $fillable = [
        'prenom',
        'nom',
        'email',
        'password',
        'confirmation_token'
    ];

    public function formations(){
        return $this->hasMany(Formation::class);
    }
}
