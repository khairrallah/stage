@extends('compte.layout')

@section('content')
<div class="container mt-5">
    <h2>Modifier le compte</h2>
    <form action="{{ route('compte.update', $compte->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Use PUT method for update -->

        <div class="form-group">
            <label for="numcompte">Numéro de compte:</label>
            <input type="number" name="numcompte" class="form-control" value="{{ $compte->numcompte }}" required>
        </div>

        <div class="form-group">
            <label for="typecompte">Type de compte:</label>
            <input type="text" name="typecompte" class="form-control" value="{{ $compte->typecompte }}" required>
        </div>

        <div class="form-group">
            <label for="dateouverture">Date d'ouverture:</label>
            <input type="date" name="dateouverture" class="form-control" value="{{ $compte->dateouverture }}" required>
        </div>
        <div class="form-group">
            <label for="solde">Solde du compte :</label>
            <input type="number" id="solde" class="form-control" name="solde" step="0.01" value="{{ $compte->solde }}" required>
        </div>

        <div class="form-group">
            <label for="datevalid">Date de validité:</label>
            <input type="date" name="datevalid" class="form-control" value="{{ $compte->datevalid }}" required>
        </div>

        <div class="form-group">
            <label for="agence_id">ID de l'agence:</label>
            <select name="agence_id" class="form-control">
                @foreach($agences as $agence)
                    <option value="{{ $agence->id }}" @if($compte->agence_id == $agence->id) selected @endif>{{ $agence->agencename }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="client_id">ID du client:</label>
            <select name="client_id" class="form-control">
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" @if($compte->client_id == $client->id) selected @endif>{{ $client->clientename }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
</div>
@endsection
