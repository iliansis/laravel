<!doctype html>
<html lang="ru">
  <head>
    <!-- Обязательные метатеги -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Привет мир!</title>
  </head>
  <body>  
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Главная</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">О компании</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link active" aria-current="page" href="#">Пользователи</a>                
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">что-то</a>
              </li>
            </ul>
            <form class="d-flex">
                <a type="button" class="btn btn-primary me-md-3"  data-bs-toggle="modal" data-bs-target="#auth">Вход</a>
                <a type="button" class="btn btn-primary me-md-3"  data-bs-toggle="modal" data-bs-target="#reg">Регистраиця</a>
            </form>
          </div>
        </div>
      </nav>


      <div class="modal fade" id="auth" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Вход</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
              <form id="auth">
                <div class="modal-body">
                  <input type="text" name="fio" required placeholder="ФИО" class="form-control"> <br>
                  <input type="password" name="pass" required placeholder="Пароль" class="form-control"> <br>                
                </div>
                <div class="modal-footer">             
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </form>        
          </div>
        </div>
      </div>

      <div class="modal fade" id="reg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Регистрация</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('reg')}}" method="POST">
              <div class="modal-body">
                <input type="text" name="fio" required placeholder="ФИО" class="form-control">               
                  <div class="invalid-feedback">
                    Looks bad!
                  </div> <br>
                <input type="text" name="login" required placeholder="Логин" class="form-control"> <br>
                <input type="email" name="email" required placeholder="Эллектронная почта" class="form-control">
                <div class="invalid-feedback">
                  Looks bad!
                </div> <br>
                <input type="password" name="pass1" required placeholder="Введите пароль" class="form-control"> 
                 
                  <div class="invalid-feedback">
                    Looks bad!
                  </div><br>                
                <input type="password" name="pass2" required placeholder="Повторите пароль" class="form-control"> <br>                
                <div class="invalid-feedback">
                  Looks bad!
                </div>
            </div>
            <div class="modal-footer">             
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </div>
             
            </form>
          </div>
        </div>
      </div>


      <script src="js/jquery-3.4.1.min.js"></script>  
        <div class="container">
          <div class="row">
            <div class="col-12">
              @yield('main')
            </div>
          </div>
        </div>

        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
  </body>
</html>
