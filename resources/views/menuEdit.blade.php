@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
<html lang="en">
<head>
    <title>Novi meni</title>
</head>
<body>
<form class="container col-md-4 col-md-offset-4" method="POST" action="{{url('menus/' . $menu->id)}}">
    @csrf
    <div class="form-group">
        <label for="croatian_title">{{ __('Ime') }}: </label>
        <input class="form-control" type="text" name="name" id="name" value="{{ old('post') ? old('post') : $menu->name }}" required>
    </div>
    <button type="submit" class="btn btn-primary">{{ __('Potvrdi') }}</button>
</form>
</body>
</html>
@endsection
