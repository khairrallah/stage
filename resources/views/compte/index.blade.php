@extends('compte.layout')

@section('content')
<div class="container mt-5">
    <h2>Liste des comptes</h2>
    <a href="{{ route('compte.create') }}" class="btn btn-primary mb-3">Créer un compte</a>
    <table class="table">
        <thead>
            <tr>
                <th>Numéro de compte</th>
                <th>Type de compte</th>
                <th>Date d'ouverture</th>
                <th>solde</th>
                <th>Date de validité</th>
                <th>ID de l'agence</th>
                <th>ID du client</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($comptes as $compte)
            <tr>
                <td>{{ $compte->numcompte }}</td>
                <td>{{ $compte->typecompte }}</td>
                <td>{{ $compte->dateouverture }}</td>
                <td>{{ $compte->solde }}</td>
                <td>{{ $compte->datevalid }}</td>
                <td>{{ $compte->agence_id }}</td>
                <td>{{ $compte->client_id }}</td>
                <td>
                    <a href="{{ route('compte.show', $compte->id) }}" class="btn btn-info">Voir</a>
                    <a href="{{ route('compte.edit', $compte->id) }}" class="btn btn-primary">Modifier</a>
                    <a href="{{ route('compte.operation', $compte->id) }}" class="btn btn-secondary">opertions</a>
                    <!-- Add delete button if you want -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
