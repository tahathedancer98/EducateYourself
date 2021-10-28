<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapitre extends Model
{
    use HasFactory;
    protected $table = "chapitres";
    public $timestamps = false;
    protected $fillable = ['name'];
}
