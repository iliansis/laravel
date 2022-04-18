@extends('layouts.main')
@section('main')
<section id="home">
    <div class="container h-100 align-items-center" >
        <div class="col-12">
            <h2>Панель администратора</h2>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur quo vero inventore facilis nisi ex, asperiores perferendis, ipsam ea iste quasi repellendus omnis cumque ut non ipsa corporis, accusamus qui.</p>
        </div>
    </div>
  </section>
<br><br>

<section id="zz">
<div class="col-6">
    <h3>Категории</h3>
    <div class="row">
        <div class="col-3">id категории</div>
        <div class="col-4">Имя категории</div>
        <div class="col-5">Удалить категорию</div>
    </div> <br>
    @foreach($cats as $c)
    <div class="row">
        <div class="col-3">
            <div class="text-center">
                {{$c->id}}
            </div>
         </div>
        <div class="col-4">{{$c->name}}</div>  
        <div class="col-4"><a href="{{route('deleteCats', $c->id)}}" onclick="return confirm('Вы дейтсивтельно хотите удалить заявку?');"  class="btn btn-danger">Удалить</a></div><br><br>  <br>   
    </div>
    @endforeach

    <h5>Создание новой категории</h5>
    <form id="addCats" action="/addCats" method="POST" >
      @csrf <!-- {{ csrf_field() }} -->
      <input type="text" class="form-control" name="name" placeholder="Имя категории">
      <div class="invalid-feedback" id="nameError">                   
    </div><br>    
  <br> 
  <button type="submit" class="btn btn-primary">Добавить категорию</button>
    </form>
    
  <br>

  <br>  

</div> 
</section>


@foreach($orders as $o)
<div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">    
    <div class="col p-4 d-flex flex-column position-static">
        <strong class="d-inline-block mb-2 text-primary">категория <span>{{$o->name}}</span></strong>
        <h3 class="mb-0">Адресс <span>{{$o->adres}}</span></h3>
      @switch($o->status)
          @case('Новая')
              <p>Новая</p>
              @break

          @case('Принято в работу')
          <p>Принято в работу</p>
              @break             
              @case('Выполнено')
          <p>Выполнено</p>
              @break

          @default          
              
      @endswitch

      @if(($o->status=="Новая"))
         
      <select class="form-control" data-id="{{$o->id}}" id="change" name="change">      
        <option value="Новая">Новая</option>
        <option value="Принято в работу">Принято в работу</option>
        <option value="Выполнено">Выполнено</option>
        </select><br><br>
        @endif

      
        <form id="change"  data-id="{{$o->id}}" action="/change" method="POST" enctype="multipart/form-data">                  
         <div id="formDesc{{$o->id}}" style="display: none;" >        
                <input class="form-control" type="text" name="com" placeholder="Комментарий"><br>
                <button class="btn btn-primary" type="submit">Отправить данные</button>
            </div>
          

           <div id="formPhoto{{$o->id}}" style="display: none;">
            <input class="form-control"  accept=" .png, .jpeg, .jpg" type="file" name="photo_end" placeholder="Вставьте фотографию"><br>
            <button class="btn btn-primary"  type="submit">Отправить данные</button>
           </div>
          </form>               



        <p class="card-text mb-auto">Описание:<span>{{$o->desc}}</span></p><br>
        @if($o->status=="Новая")
        <div class="col-3">
            <a href="{{route('deleteOrder', $o->id)}}" onclick="return confirm('Вы дейтсивтельно хотите удалить заявку?');"  class="btn btn-danger">Удалить</a>
          </div>
          @endif
      </div>

      
      <div class="col-auto d-none d-lg-block">
        
       <img src="/storage/{{$o->photo_start}}"}}  width="300px">  
  
      </div>
    </div>
  @endforeach       

 

@endsection