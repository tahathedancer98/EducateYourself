<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormationsChapitres extends Model
{
    use HasFactory;
    protected $table = "formations_chapitres";
    public $timestamps = false;
    protected $fillable = ['formation','chapitre'];
}
