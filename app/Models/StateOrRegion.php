<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StateOrRegion extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // stateOrRegion has many townships
    public function townships()
    {
        return $this->hasMany(Township::class);
    }
}
