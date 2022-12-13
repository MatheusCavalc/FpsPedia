<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'game', 'nickname', 'name', 'nationality', 'born', 'status', 'team_id', 'media', 'view'
    ];

    public function team()
    {
        return $this->hasOne(Team::class, 'id', 'team_id');
    }
}
