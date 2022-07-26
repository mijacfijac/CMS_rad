@extends('layouts.app')
@section('content')
    <!DOCTYPE html>
<html lang="en">
<head>
    <title>All projects</title>
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
        <th>{{ __('Id') }}</th>
        <th>{{ __('Ime') }}</th>
        <th>{{ __('Opis') }}</th>
        <th>{{ __('Vlasnik') }}</th>
        <th>{{ __('Detalji') }}</th>
        <th>{{ __('Uredi') }}</th>
        <th>{{ __('Obriši') }}</th>
        @php($user = Auth::user())
        </thead>
        <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>
                    <div>{{$post->id}}</div>
                </td>
                <td>
                    <div>{{$post->name}}</div>
                </td>
                <td>
                    <div>{{$post->description}}</div>
                </td>

                <td>
                    <div>{{$post->user->email}}</div>
                </td>
                <td>
                    <div><a class="btn btn-xs btn-info pull-right" href="{{ url('posts/details/'.$post->id) }}">{{ __('Detalji') }}</a></div>
                </td>
                <td>
                    <form action="{{url('posts/edit/' . $post->id)}}" method="GET" >
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-primary"><i class="fa fa-btn fa-edit"></i>Uredi</button>
                    </form>
                </td>

                <td>
                <form action="{{url('posts/' . $post->id)}}" method="POST" >
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger"><i class="fa fa-btn fa-edit"></i>Obriši</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @if($user->role != null && $user->role->id <= 3)
        <a class="btn btn-xs btn-info pull-right" href="{{ route('newPost') }}">{{ __('Novi post') }}</a>
    @endif
</div>
</body>
</html>
@endsection
