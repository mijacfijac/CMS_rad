@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 text-center">
            <div class="panel panel-default">
                <div class="panel-heading">
                @if((auth()->user() && auth()->user()->id == $post->user_id ) || (auth()->user() && auth()->user()->id && $post->user_id <= 2) )
                <br><a href="../edit/{{ $post->id }}">
                <i class="fa fa-btn fa-pencil"></i>Uredi post
                </a>
                @endif
                </div>
                <div class="panel-body">
                    <article>
                        <h2>{{ $post->name }}</h2>
                        <h4>{{ $post->description }}</h4>
                        <br>
                        <p> Slika: </p>
                        <img width="400" src="{{ asset('uploads/' . $post->image) }}" />
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection