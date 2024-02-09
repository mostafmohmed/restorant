<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catagory_Menue extends Model
{
    protected $fillable= ['categorie_id','menue_id '];
    use HasFactory;
}
