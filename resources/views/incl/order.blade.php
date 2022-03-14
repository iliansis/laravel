@if($orders && !$orders->isEmpty())
<div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
    @foreach($orders as $o)
    <div class="col p-4 d-flex flex-column position-static">
        <strong class="d-inline-block mb-2 text-primary">категория <span>{{$o->cats}}</span></strong>
        <h3 class="mb-0">Адресс <span>{{$o->name}}</span></h3>
      @switch($o->status)
          @case('Новая')
              <p>{{$o->status}}</p>
              @break

          @case('Принято в работу')
          <p>{{$o->status}}</p>
              @break
             
              @case('Выполнено')
          <p>{{$o->status}}</p>
              @break

          @default
              
      @endswitch
        <p class="card-text mb-auto">Описание:<span>{{$o->desc}}</span></p><br>
        <div class="col-3">
            <a href="{{route('deleteOrder', $o->id)}}"  class="btn btn-danger">Удалить</a>
          </div>
      </div>

      
      <div class="col-auto d-none d-lg-block">
       <img src="/storage/{{$o->photo_start}}"}} width="300px">  
  
      </div>
    </div>
  @endforeach      
  @else

  <div class="text-centser">
      <h4>Заявок нет</h4>
  </div>
      
  @endif