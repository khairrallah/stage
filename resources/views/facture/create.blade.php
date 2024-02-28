@extends('facture.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Créer une facture</div>
                    <div class="card-body">
                        <form action="{{ route('facture.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="compte_id">Compte :</label>
                                <select name="compte_id" class="form-control">
                                    @foreach($comptes as $compte)
                                        <option value="{{ $compte->id }}">{{ $compte->numcompte }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="numero">Numéro :</label>
                                <input type="text" name="numero" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="nom_beneficiaire">Nom du bénéficiaire :</label>
                                <input type="text" name="nom_beneficiaire" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="montant">Montant :</label>
                                <input type="number" name="montant" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="date_emission">Date d'émission :</label>
                                <input type="date" name="date_emission" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Créer la facture</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
