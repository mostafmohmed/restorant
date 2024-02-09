<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menue extends Model
{
    protected $fillable = [
        'name',
        'price',
        'descreption',
        'image',
    ];
    public function catagory()
    {
        return $this->belongsToMany(Category::class,'catagory__menues','menue_id','categorie_id');
    }
    use HasFactory;
}
