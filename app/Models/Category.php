<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    protected $fillable = [
        'name',
        'descreption',
        'image'
       
    ];
    public function menus()
    {
        return $this->belongsToMany(Menue::class,'catagory__menues','categorie_id','menue_id');
    }
    use HasFactory;
}
