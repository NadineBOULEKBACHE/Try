<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Etagere extends Model
{
    protected $fillable = [
        'Etagere_libelle',
        'rayons_id',
        'colones_id',
       
    ];

    public function rayon(): BelongsTo
    {
        return $this->belongsTo(Rayon::class, 'rayons_id');
    }
    public function colone(): BelongsTo
    {
        return $this->belongsTo(Colone::class, 'colones_id');
    }
}

