<?php

// app/Models/Rafistoleur.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rafistoleur extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'neighborhood', 'speciality',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}

