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

<section id="cart">
  <div class="container">
    <div class="row">
      <div class="col-3">
          <div class="card" style="width: 18rem;">
              <img src="img/до.jpg" class="card-img-top" id="img1">
              <img src="img/после.jpg" class="card-img-top" id="img2">
              <div class="card-body">
                <h5 class="card-title">название проекта <p></p></h5>
                <h6 class="card-text">описание проекта <p></p></h6>
                <h6 class="card-text">категория <p></p></h6>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
      </div>
  
      <div class="col-3">
          <div class="card" style="width: 18rem;">
              <img src="..." class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
      </div>
  
      <div class="col-3">
          <div class="card" style="width: 18rem;">
              <img src="..." class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
      </div>
  
      <div class="col-3">
          <div class="card" style="width: 18rem;">
              <img src="..." class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
      </div>
  </div>
  </div>
</section>


 
@endsection