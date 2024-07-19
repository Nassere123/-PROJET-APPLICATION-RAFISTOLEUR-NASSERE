<?php

// app/Models/Order.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'rafistoleur_id', 'status', 'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rafistoleur()
    {
        return $this->belongsTo(Rafistoleur::class);
    }
}
