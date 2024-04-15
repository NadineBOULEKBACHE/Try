<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Colone extends Model
{
    protected $fillable = [
        'Colone_libelle',
        'rayons_id',
       
    ];

    public function rayon(): BelongsTo
    {
        return $this->belongsTo(Rayon::class, 'rayons_id');
    }
}
