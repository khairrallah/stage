@extends('operation.layout')

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div class="pull-right">

    <a class="btn btn-primary btn-lg btn-block" href="{{ route('operation.deposit') }}"> DEPOT</a><br>
    <a class="btn btn-primary btn-lg btn-block" href="{{ route('operation.withdraw') }}"> retrait</a><br>
    <a class="btn btn-primary btn-lg btn-block" href="{{ route('operation.transfer') }}"> transfer</a><br>
    <a class="btn btn-primary btn-lg btn-block" href="{{ route('facture.index') }}"> paybill</a><br>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste des opérations</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>propritaire du Compte</th>
                                <th>Libellé</th>
                                <th>Date</th>
                                <th>Débit</th>
                                <th>Crédit</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($operations as $operation)
                            <tr>
                                <td>{{ $operation->id }}</td>
                                <td>{{ $operation->compte_id }}</td>
                                <td>{{ $operation->operationlibelle }}</td>
                                <td>{{ $operation->operation_date }}</td>
                                <td>{{ $operation->montant_debit }}</td>
                                <td>{{ $operation->montant_credit }}</td>
                                <td>
                                    <a href="{{ route('operation.show', $operation->id) }}" class="btn btn-primary">Voir</a>
                                    <a href="{{ route('operation.edit', $operation->id) }}" class="btn btn-secondary">Modifier</a>
                                    <form action="{{ route('operation.destroy', $operation->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
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
