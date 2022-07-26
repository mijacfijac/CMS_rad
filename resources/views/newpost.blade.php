@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
<html lang="en">
<head>
    <title>Novi post</title>
</head>
<body>
<form class="container col-md-4 col-md-offset-4" method="POST" action="{{ route('posts') }}" enctype='multipart/form-data'>
    @csrf
    <div class="form-group">
        <label for="croatian_title">{{ __('Ime posta') }}: </label>
        <input class="form-control" type="text" name="name" id="name" required>
    </div>
    <div class="form-group">
        <label for="description">{{ __('Opis') }}: </label>
        <textarea class="form-control" rows=5 name="description" id="description" required></textarea>
    </div>
    <div class="form-group">
		<label for="post-image" class="col-sm-3 control-label">Slika</label>
		<div class="col-sm-6">
			<input type="file" name="image" id="post-image" class="form-control">
		</div>
	</div>
    <button type="submit" class="btn btn-primary">{{ __('Potvrdi') }}</button>
</form>
</body>
</html>
@endsection
