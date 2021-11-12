<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormationsCategories extends Model
{
    use HasFactory;
    protected $table = "formations_categories";
    public $timestamps = false;
    protected $fillable = ['formation','categorie'];
}
