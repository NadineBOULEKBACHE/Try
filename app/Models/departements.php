<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class departements extends Model
{
    protected $fillable = [
        'Depart_name',
        'directions_id',
       
    ];

    public function direction(): BelongsTo
    {
        return $this->belongsTo(directions::class, 'directions_id');
    }
}
