

@extends('compte.layout')
@section('content')

        <h2>Créer un compte</h2>
        <form action="{{route('compte.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="numcompte">Numéro de compte:</label>
                <input type="number" name="numcompte" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="typecompte">Type de compte:</label>
                <input type="text" name="typecompte" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="dateouverture">Date d'ouverture:</label>
                <input type="date" name="dateouverture" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="solde">Solde du compte :</label>
                <input type="number" id="solde" name="solde" class="form-control" step="0.01" placeholder="Entrez le solde" required>
            </div>
            <div class="form-group">
                <label for="datevalid">Date de validité:</label>
                <input type="date" name="datevalid" class="form-control" required>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>agence id:</strong>
                        <select name="agence_id" class="form-control">
                            @foreach($agences as $agence)
                                <option value="{{ $agence->id }}">{{ $agence->agencename }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>agence id:</strong>
                            <select name="client_id" class="form-control">
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->clientename }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="create">
        </form>
        <div class="" style="height: 60px"></div>
@endsection
