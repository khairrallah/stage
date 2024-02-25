<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class operation extends Model
{
    protected $fillable = [
        'compte_id',
        'operationlibelle',
        'operation_date',
        'montant_debit',
        'montant_credit',
    ];

    public function compte()
    {
        return $this->belongsTo(Compte::class);
    }
}
