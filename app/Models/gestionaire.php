<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class gestionaire extends Model
{
    use HasFactory;
    protected $fillable = [
        'gestionairename',
        'agence_id',
        'gestionairepost'
    ];
    public function agence(): HasMany
    {
        return $this->hasMany(agence::class);
    }
}
