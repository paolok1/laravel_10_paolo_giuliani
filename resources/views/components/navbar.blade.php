<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('home')}}">BOOKSHOP</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar display-flex" id="navbarNav">
        <ul class="navbar-nav">
                    <li class="nav-item">
            <a class="nav-link" href="{{route('product.index')}}">Libri</a>
          </li>
          @auth
          <li class="nav-item">
            <a class="nav-link" href="{{ route('product.my') }}">I miei libri</a>
          </li>
          @endauth

            
            @guest

          <li class="nav-item"><a class="nav-link" href="{{route('login')}}">Accedi</a> 
          </li>
          <li class="nav-item"><a class="nav-link" href="{{route('register')}}">Registrati</a>
          </li>

            @endguest
            
            @auth
            <li class="nav-item">
              <a class="nav-link" href="#">Benvenut* {{Auth::user()->name}}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('product.create')}}">Inserisci libro</a>
            </li>
          <li class="nav-item">
            <form
              action="{{route('logout')}}"
              method="POST">
              @csrf
              <button 
              class="nav-link"
              type="submit">Logout</button>
            </form>
              
          </li>
        </div>
        @endauth
      </ul>
    </div>
    </div>
  </nav>

</body>

</html>