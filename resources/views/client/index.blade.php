@extends('client.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>Laravel 8 CRUD Example</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('client.create') }}"> Create New client</a>
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
            <th>client Name</th>
            <th>client adresse</th>
            <th>client Type</th>
            <th>code postal</th>
            <th>client ville</th>
            <th>numero de telphone</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($clients as $client)
        <tr>
            <td>{{ $client->id }}</td>
            <td>{{ $client->clientename }}</td>
            <td>{{ $client->clientadresse }}</td>
            <td>{{ $client->clienttype }}</td>
            <td>{{ $client->codepostal }}</td>
            <td>{{ $client->clientville }}</td>
            <td>{{ $client->numtel }}</td>
            <td>
                <form action="{{ route('client.destroy',$client->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('client.show',$client->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('client.edit',$client->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>
    {{ $clients->links() }}


@endsection




