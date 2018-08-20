@extends('admin.master')
@section('title')
Members
@endsection
@section('container')  
		 <h1 class="text-center">manageMembers</h1>
		  <div class="container">
		   <div class="table-responsive">
		    <table class="main-table table table-bordered text-center">
			 <tr>
			  <td>ID</td>
			  <td>Name</td>
			  <td>email</td>
			  <td style:=width: 5cm> user</td>
			  <td style:=width: 5cm> editor</td>
			  <td style:=width: 5cm> Admin</td>
			 </tr>
 @foreach($users as $user)
                           <form method="post" action="{{url('/members/add-role')}}">
                              {{ csrf_field() }}
                              <input type="hidden" name="email" value="{{$user->email}}">
                            <tr>
                                <th>{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                               <td>{{$user->email}}</td>
                               <td><input type="checkbox" name="role_user" onchange="this.form.submit()"
                                 {{$user->hasRole('user')?'checked':''}} > </td>
                               <td><input type="checkbox" name="role_editor" onchange=" this.form.submit()"            
                                {{$user->hasRole('editor')?'checked':''}} > </td>
                               <td><input type="checkbox"name="role_admin" onchange=" this.form.submit()"
                                {{$user->hasRole('Admin')?'checked':''}} > </td>
                            </tr>
                            </form>
                           @endforeach
                       </table>









		   
		  </div>
	

</div>

@stop 
@section('js')

@endsection
