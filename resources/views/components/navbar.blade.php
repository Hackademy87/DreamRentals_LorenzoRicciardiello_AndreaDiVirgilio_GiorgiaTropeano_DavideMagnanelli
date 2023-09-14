
<nav class="navbar navbar-expand-sm navbar-light " id="neubar">
    <div class="container">
      <a class="navbar-brand" href=""><img src="" height="60"/>

    </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class=" collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto ">
          <li class="nav-item">
            <a class="nav-link mx-2 active" aria-current="page" href="{{route('home')}}">Home</a>
          </li>
         @auth
          <li class="nav-item">
            <a class="nav-link mx-2" href="{{route('product.create')}}">Aggiungi Prodotti</a>
          </li>
          @endauth
          <li class="nav-item dropdown">
            <a class="nav-link mx-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             Categorie
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                @foreach($productCategories as $category)
                <a class="dropdown-item" href="{{route('product.bycategory',compact('category'))}}">{{$category->name}}</a>
              @endforeach
            </ul>
          </li>
            @if(Auth::user() == null)
              <li class="nav-item">

                <a href="{{route('login')}}"><button> Login
                </button></a>
              </li>
              <li class="nav-item">
                <a href="{{route('register')}}"><button> Registrati
                </button></a>
            @else
              <li class="nav-item">
                {{ Auth::user()->name }}
              </li>
              <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button class="btn btn-secondary mx-2" >Logout</button>
                </form>
              </li>
            @endif

        </ul>
      </div>
    </div>
  </nav>



