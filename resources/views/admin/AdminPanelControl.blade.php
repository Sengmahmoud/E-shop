@extends('admin.master')
@section('title')
AdminPanel
@endsection
@section('container')  
   <section class="home-stats text-center">
   <div class="container">
     <h1>@lang('Adminbg')</h1>
     <div class="row">
       <div class="col-md-3">
        <div class="stat st-members">
        <i class="fa fa-users"></i>
        <div class="info">
         Total Members
       <span><a href="{{url('members')}}">members</a></span>
        </div>
      </div>
       </div>
     <div class="col-md-3">
        <div class="stat st-pending">
        <i class="fa fa-user-plus"></i>
        <div class="info">
           @lang('pendingM')
           <span><a href="members.php?do=manage&page=pending">mm</a></span>
        </div>
      </div>
       </div>

     <div class="col-md-3">
        <div class="stat st-items">
          <i class="fa fa-tag"></i>
          <div class="info">
             total Products
             <span><a href="{{url('/productsIndex')}}">Products</a></span>
        </div>
      </div>
       </div>

     <div class="col-md-3">
        <div class="stat st-comments">
          <i class="fa fa-comments"></i>
          <div class="info">
             @lang('totalC')
             <span><a href="comments.php?">comments</a></span>
        </div>
      </div>
       </div>
     </div>
   </div>
   </section>
   <section class="latest">
    <div class="container">
     <div class="row">
     
       
     <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading">
        
        <i class="fa fa-tasks"></i><span> 
        
         users register : {{$users->count()}}</span>
        <span class="pull-right plus-icon"><i class="fa fa-plus fa-lg"></i></span>
      </div>
      @foreach($users as $user)
      <div class="panel-body">
        <ul class="list-unstyled latest-items">
      
        <li>{{$user->name}}<a href='#'><span class='btn btn-success pull-right'=><i class='fa fa-edit'></i> edit </a>
            
        
          </span><br/></li>
      
        </ul>
      </div>
       @endforeach
      </div>

     </div>
     
     <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading">
        
        <i class="fa fa-tasks"></i><span> 
        
         product added : {{$products->count()}}</span>
        <span class="pull-right plus-icon"><i class="fa fa-plus fa-lg"></i></span>
      </div>
      @foreach($products as $prod)
      <div class="panel-body">
        <ul class="list-unstyled latest-items">
      
        <li>{{$prod->prod_name}}<a href='#'><span class='btn btn-success pull-right'=><i class='fa fa-edit'></i> edit </a>
            
        
          </span><br/></li>
      
        </ul>
      </div>
       @endforeach
      </div>

     </div>
     
    
     
     
     
     <div class="row">
     
       <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading">
        <?php echo'5'?>
       <i class="fa fa-comments-o"></i>
       @lang('latest')  '5'
       @lang('comment') @lang('register')
       <span class="pull-right plus-icon"><i class="fa fa-plus fa-lg"></i></span>
      </div>
      <div class="panel-body">
        
        
        <div class='comment-box'>
                       <a href='members.php?do=edit&ID=$uid'><span class='member'>userName</span></a>
             <p class='comment'>comments</p>
        </div>";
      </div>
      </div>
     </div>
     
     <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading">
        '5' 
        <i class="fa fa-tasks"></i><span> 
       @lang('latest') 5
        @lang('categories') @lang('register')</span>
        <span class="pull-right plus-icon"><i class="fa fa-plus fa-lg"></i></span>
      </div>
      <div class="panel-body">
        <ul class="list-unstyled latest-items">
       
          <li>Name<a href='categories.php?do=edit&ID=$prodID'><span class='btn btn-success pull-right'=><i class='fa fa-edit'></i> edit </a>
          
        
      </span><br/></li>
     
        </ul>
      </div>
      </div>
     </div>
     
     
     </div>
     
    </div>
   </section>
  
 

 

@stop
@section('js')

@endsection






 


























