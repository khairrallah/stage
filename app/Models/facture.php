<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class facture extends Model
{
    protected $fillable = [
        'compte_id',
        'numero',
        'nom_beneficiaire',
        'montant',
        'date_emission',
        'paye',
    ];
}
