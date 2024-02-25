@extends('operation.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Détails de l'opération</div>

                    <div class="card-body">
                        <p><strong>Identifiant :</strong> {{ $operation->id }}</p>
                        <p><strong>Libellé :</strong> {{ $operation->operationlibelle }}</p>
                        <p><strong>Date de l'opération :</strong> {{ $operation->operation_date }}</p>
                        <p><strong>Montant débit :</strong> {{ $operation->montant_debit }}</p>
                        <p><strong>Montant crédit :</strong> {{ $operation->montant_credit }}</p>
                        <p><strong>Compte associé :</strong> {{ $operation->compte_id }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
