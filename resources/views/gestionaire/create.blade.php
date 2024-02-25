@extends('gestionaire.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New gestionaire</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('gestionaire.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('gestionaire.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>gestionaire Name:</strong>
                <input type="text" name="gestionairename" class="form-control" placeholder="Name">
            </div>
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

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>gestionaire POST:</strong>
                <textarea class="form-control" style="height:150px" name="gestionairepost" placeholder="post"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection
