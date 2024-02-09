<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $table='messages';
    protected $fillable = ['user_id', 'message_text','admin_id'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function Admin()
    {
        return $this->belongsTo(Admin::class,'admin_id');
    }
}
