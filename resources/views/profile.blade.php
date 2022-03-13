@extends('layouts.main')
@section('main')
<section id="home">
    <div class="container h-100 align-items-center" >
        <div class="col-12">
            <h2>Профиль пользователя</h2>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur quo vero inventore facilis nisi ex, asperiores perferendis, ipsam ea iste quasi repellendus omnis cumque ut non ipsa corporis, accusamus qui.</p>
        </div>
    </div>
  </section>
  <br><br>


  
  <section id="zz">
    <div class="col-6">
        <h3>Оставьте свою заявку</h3>
        <form id="addOrder" action="/addOrder" method="POST" enctype="multipart/form-data">
          @csrf <!-- {{ csrf_field() }} -->
          <input type="text" class="form-control" name="name" placeholder="Адресс">
          <div class="invalid-feedback" id="adressError">                   
        </div><br>
        <input type="text" class="form-control"  name="desc" placeholder="Описание">
          <div class="invalid-feedback" id="adressError">                   
        </div><br>
        <select class="form-control" name="cats">
            @foreach($cat as $c)
              <option value="{{$c->id}}">{{$c->name}}</option>  
            @endforeach           
        </select >         
      <br>
      <input type="file" class="form-control"  name="photo_start" accept=".png, .jpg, .bmp" placeholder="Вставьте пожалуйста фото вашего проекта">
          <div class="invalid-feedback" id="fileError">                   
        </div><br>
      <button type="submit" class="btn btn-primary">Создать заявку</button>
        </form>
        
      <br>

      <br>

      <h3>Фильтрация</h3>
      <select class="form-control" name="filter">
        <option value="Все">Все</option>
        <option value="Новая">Новая</option>
        <option value="Принято в работу">Принято в работу</option>
        <option value="Выполнено">Выполнено</option>
      </select><br><br>

<div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
  @foreach($orders as $o)
  <div class="col p-4 d-flex flex-column position-static">
      <strong class="d-inline-block mb-2 text-primary">категория <span>{{$o->cats}}</span></strong>
      <h3 class="mb-0">Адресс <span>{{$o->name}}</span></h3>
      <div class="mb-1 text-muted">{{$o->status}}</div>
      <p class="card-text mb-auto">Описание:<span>{{$o->desc}}</span></p>
      <a href="{{route('deleteOrder', $o->id)}}"  class="btn btn-danger">Удалить</a>
    </div>
    <div class="col-auto d-none d-lg-block">
     <img src="{{$o->photo_start}}" alt="{{$o->photo_start}}">  

    </div>
  </div>
@endforeach

</div> 
  </section>



@endsection
