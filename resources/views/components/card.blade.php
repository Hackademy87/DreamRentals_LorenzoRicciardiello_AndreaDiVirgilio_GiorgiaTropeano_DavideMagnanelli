<div class="card" style="width: 18rem;">
  <img src="{{Storage::url($product->img)}}" class="card-img-top" alt="{{$product->name}}">
  <div class="card-body">
    <h5 class="card-title">{{$product->name}}</h5>
    <p class="card-text">{!!$product->description!!}</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
<div class="card-footer">
    <p>{{$product->price}}</p>
</div>

</div>
