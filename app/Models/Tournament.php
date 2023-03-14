<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;

    protected $fillable = [
        'game',
        'status',
        'tier',
        'name',
        'prize',
        'participants_number',
        'location',
        'winner',
        'runner_up',
        'view'
    ];
}
