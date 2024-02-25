<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class compte extends Model
{
    use HasFactory;
    protected $fillable = [
        'numcompte',
        'typecompte',
        'dateouverture',
        'solde',
        'datevalid',
        'agence_id',
        'client_id'

    ];


    public function agence(): HasMany
    {
        return $this->hasMany(agence::class);
    }
    public function client(): HasMany
    {
        return $this->hasMany(client::class);
    }
}
