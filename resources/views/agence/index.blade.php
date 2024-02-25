@extends('agence.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>Laravel 8 CRUD Example</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('agence.create') }}"> Create New agence</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>agence Name</th>
            <th>agence adresse</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($agences as $agence)
        <tr>
            <td>{{ $agence->id }}</td>
            <td>{{ $agence->agencename }}</td>
            <td>{{ $agence->agenceadresse }}</td>
            <td>
                <form action="{{ route('agence.destroy',$agence->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('agence.show',$agence->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('agence.edit',$agence->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>
    {{ $agences->links() }}


@endsection




