@extends('layouts.app')

@section('content')


        <!-- New task form-->
        <form action="{{url('role/' . $role->id)}}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- role name-->
            <div class="form-group">
                <label for="role-name" class="col-sm-3 control-label">Naziv uloge</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="role-name" class="form-control" value="{{ old('role') ?
                        old('role') : $role->name }}">
                </div>
            </div>

            <!--add task button-->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-save"></i>Spremi
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
@endsection

