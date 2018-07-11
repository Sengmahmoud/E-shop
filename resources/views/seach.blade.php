<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="../bootstrap.min.css">
<script type="text/javascript" src="../bootstrap.min.js"></script>
@foreach($lap as $lpp)
<div class="col-md-3">
    <br/>
    <img src="{{asset('images/'.$lpp->img)}}"
         style="width:300px;height:300px;border-radius: 9px;"/>
    <br/>
    <h3 style="height:100px;">{{$lpp->name}}</h3>
    <h4>{{$lpp->orign}}</h4>
    <h4>{{$lpp->price}}</h4>
    <a class="btn btn-success" href="comments.html">view comments</a>
</div>
@endforeach