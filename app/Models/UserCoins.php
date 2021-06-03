<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCoins extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'usercoins';

    protected $fillable = [
        'coins',
        'user_id',
        'type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
