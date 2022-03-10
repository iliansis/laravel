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
        <form action="" class="multipart/form-data"></form>
        <input type="text" class="form-control" name="adress" placeholder="Адресс">
        <div class="invalid-feedback" id="adressError">                   
      </div><br>
      <input type="text" class="form-control"  name="desc" placeholder="Описание">
        <div class="invalid-feedback" id="adressError">                   
      </div><br>
      <select class="form-control">
          {{-- @foreach
            
  
          @endforeach --}}
          <option value="2d дизайн">2d дизайн</option>
          <option value="3d дизайн">3d дизайн</option>
      </select >         
    <br>
    <input type="file" class="form-control"  name="photo_start" placeholder="Вставьте пожалуйста фото вашего проекта">
        <div class="invalid-feedback" id="adressError">                   
      </div><br>
    <button type="submit" class="btn btn-primary">Создать заявку</button>
      <br>


<div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
    <div class="col p-4 d-flex flex-column position-static">
      <strong class="d-inline-block mb-2 text-primary">категория</strong>
      <h3 class="mb-0">Featured post</h3>
      <div class="mb-1 text-muted">Nov 12</div>
      <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
      <a href="#" class="btn btn-danger">Удалить к хуям</a>
    </div>
    <div class="col-auto d-none d-lg-block">
      <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

    </div>
  </div>


</div> 
  </section>



@endsection
