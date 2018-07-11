@extends('master')
@section('content')
    <span><b>All Categoriess</b></span>
    <table class="table table-dark">
        <tbody>
        <tr>

            @foreach($cats as $cat)

                <td>
                    <a href="home/{{$cat->id}}">{{$cat->cat_name}}</a>

                </td>


                <td>
                    <a href="categorystore/{{$cat->id}}/delete" class="btn btn-danger ">Delete</a>
                </td>
                <td>
                    <a href="categorystore/{{$cat->id}}/upform" class="btn btn-primary ">update</a>
                </td>
        </tr>

        @endforeach
        </tbody>
    </table>

    <div class="form-group" mr  >
        <form method="post" action="categorystore/add">
            {{csrf_field()}}
            <label for="formGroupExampleInput">Example label</label>
            <input type="text" name="cat_name" class="form-control" id="formGroupExampleInput">
            <button type="submit" class="btn btn-primary">ADD</button>

        </form>
    </div>




@stop