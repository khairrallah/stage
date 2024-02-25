@extends('operation.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Operation</div>

                <div class="card-body">
                    <form action="{{ route('operation.store') }}" method="POST">
                        @csrf

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
                            <label for="operationlibelle">operation libelle </label>
                            <input type="text" name="operationlibelle" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="operation_date">Operation Date:</label>
                            <input type="date" name="operation_date" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="montant_debit">Montant Debit:</label>
                            <input type="number" name="montant_debit" class="form-control" step="0.01">
                        </div>

                        <div class="form-group">
                            <label for="montant_credit">Montant Credit:</label>
                            <input type="number" name="montant_credit" class="form-control" step="0.01">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
