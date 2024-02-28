@extends('facture.layout')

@section('content')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>Laravel 8 CRUD Example</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('facture.create') }}"> Create New bill</a>
            </div>
        </div>
@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Liste des factures</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Numéro</th>
                                    <th>Nom du bénéficiaire</th>
                                    <th>Montant</th>
                                    <th>Date d'émission</th>
                                    <th>Payé</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($factures as $facture)
                                    <tr>
                                        <td>{{ $facture->numero }}</td>
                                        <td>{{ $facture->nom_beneficiaire }}</td>
                                        <td>{{ $facture->montant }}</td>
                                        <td>{{ $facture->date_emission }}</td>
                                        <td>{{ $facture->paye ? 'Oui' : 'Non' }}</td>
                                        <td>
                                            @if (!$facture->paye)
                                                <form action="{{ route('facture.payer', $facture->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary">Payer</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
