<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'Owner',
        'Nickname',
        'Status',
        'Mood',
        'IsPasswordProtected',
        'password'
    ];




    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
