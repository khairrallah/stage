@extends('compte.layout')

@section('content')
<div class="container mt-5">
    <h2>Détails du compte</h2>
    <div>
        <strong>Numéro de compte:</strong> {{ $compte->numcompte }} <br>
        <strong>Type de compte:</strong> {{ $compte->typecompte }} <br>
        <strong>Date d'ouverture:</strong> {{ $compte->dateouverture }} <br>
        <strong>solde du compte:</strong> {{ $compte->solde }} <br>
        <strong>Date de validité:</strong> {{ $compte->datevalid }} <br>
        <strong>ID de l'agence:</strong> {{ $compte->agence_id }} <br>
        <strong>ID du client:</strong> {{ $compte->client_id }} <br>
    </div>
    <a href="{{ route('compte.index') }}" class="btn btn-primary mt-3">Retour à la liste des comptes</a>
</div>
@endsection
