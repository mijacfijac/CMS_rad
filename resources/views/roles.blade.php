@extends('layouts.app')
@section('content')
    <!DOCTYPE html>
<html lang="en">
<head>
    <title>Choose a user</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .table {
            margin-top: 10%;
        }
    </style>
</head>
<body>
<div class="container table-responsive">
    <table class="table table-striped table-hover">
        <thead class="thead-dark">
        <th>ID</th>
        <th>Naziv</th>
        <th>Uredi</th>
        <th>Obriši</th>
        </thead>
        <tbody>
        @foreach ($roles as $role)
            <tr>
                <td>
                    <div>{{$role->id}}</div>
                </td>
                <td>
                    <div>{{$role->name}}</div>
                </td>               
                <td>
                    <form action="{{url('role/edit/' . $role->id)}}" method="GET" >
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-primary"><i class="fa fa-btn fa-edit"></i>Uredi</button>
                    </form>
                </td>

                <td>
                <form action="{{url('role/' . $role->id)}}" method="POST" >
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger"><i class="fa fa-btn fa-edit"></i>Obriši</button>
                    </form>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    <a class="btn btn-xs btn-info pull-right" href="{{ route('newRole') }}">{{ __('Nova uloga') }}</a>
</div>
</body>
</html>
@endsection
