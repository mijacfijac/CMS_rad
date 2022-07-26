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
        <th>{{ __('Uredi') }}</th>
        <th>{{ __('Obriši') }}</th>
        <th>{{ __('Postovi') }}</th>
        <th>{{ __('Obriši post iz Menija') }}</th>
        @php($user = Auth::user())
        </thead>
        <tbody>
        @foreach ($menus as $menu)
            <tr>
                <td>
                    <div>{{$menu->id}}</div>
                </td>
                <td>
                    <div>{{$menu->name}}</div>
                </td>
                <td>
                    <form action="{{url('menus/edit/' . $menu->id)}}" method="GET" >
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-primary"><i class="fa fa-btn fa-edit"></i>Uredi</button>
                    </form>
                </td>

                <td>
                <form action="{{url('menus/' . $menu->id)}}" method="POST" >
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger"><i class="fa fa-btn fa-edit"></i>Obriši</button>
                    </form>
                </td>
                <td>
                    @foreach ($menu->posts as $menuPost)
                    <div>
                        <a  class="btn btn-xs btn-info pull-right" href="{{ url('posts/details/'.$menuPost->id) }}">{{ $menuPost->pivot->name }}</a>
                    </div></br>
                    @endforeach
                </td>
                <td>
                    @foreach ($menu->posts as $menuPost)
                    <div>
                        <form class="d-inline" action="{{url('deletePost/'.$menu->id .'/'. $menuPost->id)}}" method="POST" >
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-warning"><i class="fa fa-btn fa-edit"></i>{{ __('Obriši post iz Menija') }}</button>
                        </form>
                    </div></br>
                    @endforeach
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @if($user->role != null && $user->role->id == 1)
        <a class="btn btn-xs btn-info pull-right" href="{{ route('newMenu') }}">{{ __('Novi Meni') }}</a>

        <a class="btn btn-xs btn-info pull-right" href="{{ route('addPostToMenu') }}">{{ __('Novi post u Meniju') }}</a>
    @endif
</div>
</body>
</html>
@endsection
