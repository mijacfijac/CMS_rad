@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="content">
<div class="px-4 py-5 my-5 text-center">
                <div class="title m-b-md">
                    CMS završni rad
                </div>
                  <h2>Dobrodošli na stranicu  CMS završni rad- Mia Ilić</h2>

            
                  </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
