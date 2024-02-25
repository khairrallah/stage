@extends('operation.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modifier l'opération</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('operation.update', $operation->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>compte id:</strong>
                                        <select name="compte_id" class="form-control">
                                            @foreach($comptes as $compte)
                                                <option value="{{ $compte->id }}">{{ $compte->numcompte }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="operationlibelle">Libellé :</label>
                                <input type="text" class="form-control" id="operationlibelle" name="operationlibelle" value="{{ $operation->operationlibelle }}" required>
                            </div>
                            <div class="form-group">
                                <label for="operation_date">Date de l'opération :</label>
                                <input type="date" class="form-control" id="operation_date" name="operation_date" value="{{ $operation->operation_date }}" required>
                            </div>
                            <div class="form-group">
                                <label for="montant_debit">Montant débit :</label>
                                <input type="number" class="form-control" id="montant_debit" name="montant_debit" value="{{ $operation->montant_debit }}">
                            </div>
                            <div class="form-group">
                                <label for="montant_credit">Montant crédit :</label>
                                <input type="number" class="form-control" id="montant_credit" name="montant_credit" value="{{ $operation->montant_credit }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
