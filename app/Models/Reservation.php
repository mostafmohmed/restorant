<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
     	 	 	 	 	 	
    protected $fillable = [
        'first_name',
        'last_name',
        'email','tel_number','res_data','table_id','guet_number'
    ];
    protected $dates = [
        'res_date'
    ];

    function table()
    {
        return $this->belongsTo(Table::class,'table_id');
    }
    use HasFactory;
}
