@extends('gestionaire.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Gestionaire</h2>
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

    <form action="{{ route('gestionaire.update', $gestionaires->id) }}" method="POST">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="gestionairename" value="{{ $gestionaires->gestionairename }}" class="form-control" placeholder="Name">
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
                    <strong>gestionaire post:</strong>
                    <textarea class="form-control" style="height:150px" name="gestionairepost" placeholder="gestionairepost">{{ $gestionaires->gestionairepost }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
