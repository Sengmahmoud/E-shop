@extends('master')

@section('content')

    <div class="form-group"  >
        <form method="post" action="update">

            {{csrf_field()}}
            <div class="input-group mb-3">
                <input type="text" name="cat_name" value="{{$id->cat_name}}" class="form-control">
                <button type="submit" class="btn btn-primary">edit</button>
            </div>
        </form>
    </div>
@stop