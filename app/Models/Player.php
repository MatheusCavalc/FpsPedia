<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'game',
        'nickname',
        'name',
        'nationality',
        'born',
        'status',
        'overview',
        'team_id',
        'alternate_nicks',
        'earnings',
        'cs_roles',
        'media',
        'view'
    ];

    public function team()
    {
        return $this->hasOne(Team::class, 'id', 'team_id');
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'cs_roles' => 'array',
    ];
}
