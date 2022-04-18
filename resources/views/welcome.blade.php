@extends('layouts.main')
@section('main')

<section id="home">
  <div class="container h-100 align-items-center" >
      <div class="col-12">
          <h1> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit est esse laborum, autem, placeat veritatis quisquam molestiae earum consequuntur odit quibusdam velit ab? Excepturi perspiciatis, porro voluptatibus exercitationem sint tempora?</h1>
          <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur quo vero inventore facilis nisi ex, asperiores perferendis, ipsam ea iste quasi repellendus omnis cumque ut non ipsa corporis, accusamus qui.</p>
      </div>
  </div>
</section>

<section id="orders">
  <div class="col-4">
    <h5>Выполненных заявок:<span class="badge bg-secondary">{{$countOrder->count}}</span></h5>
    <br>
  </div>
  <div class="container">
    <div class="row">
      @foreach($orders  as $o)
      <div class="col-3">
          <div class="card" style="width: 18rem;">
            <div class="img">
              <div class="img1" style="background: url(/storage/{{$o->photo_start}}) center center no-repeat; background-size: cover;"></div>
              <div class="img2" style="background: url(/storage/{{$o->photo_end}}) center center no-repeat; background-size: cover;"></div>
            </div>         
          
              <div class="card-body">
                <h5 class="card-title">название проекта <p>{{$o->adres}}</p></h5>
                <h6 class="card-text">описание проекта <p>{{$o->desc}}</p></h6>
                <h6 class="card-text">категория <p>{{$o->name}}</p></h6>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
      </div>
      @endforeach
</div> 
      
  </div>
  </div>
</section>


 
@endsection