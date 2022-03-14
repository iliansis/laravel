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
          <input type="text" class="form-control" name="adres" placeholder="Адресс">
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

</div> 
  </section>

  <h3>Фильтрация</h3>
  <select class="form-control" id="filter" name="filter">
    <option value="Все">Все</option>
    <option value="Новая">Новая</option>
    <option value="Принято в работу">Принято в работу</option>
    <option value="Выполнено">Выполнено</option>
  </select><br><br>

  <div id="orders">@include('incl.order')</div>


@endsection
