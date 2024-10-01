<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Township extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'zip_code',
        'state_or_region_id',
    ];

    // township belongTo stateOrRegion
    public function stateOrRegion()
    {
        return $this->belongsTo(StateOrRegion::class);
    }
}
