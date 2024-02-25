@extends('gestionaire.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show gestionaire details</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('gestionaire.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $gestionaires->gestionairename }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>agence ID:</strong>
                {{ $gestionaires->agence_id }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>le POSTE:</strong>
                {{ $gestionaires->gestionairepost }}
            </div>
        </div>
    </div>
@endsection
