<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700&display=swap" rel="stylesheet">
    <title>E-Vortex</title>
</head>

<body style="background-color: #051022">
    <div  class="bg-image" style="background-image:url(https://static.tibia.com/images/global/header/background-artwork.jpg);background-repeat: repeat-x" >
        <header>
            <nav class="navbar navbar-expand-md navbar navbar-dark bg-dark shadow-sm">
                <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">E-vortex</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarCategoria" role="button" data-bs-toggle="dropdown">Categorias</a>
                            <ul class="dropdown-menu bg-dark" aria-labelledby="navbarCategoria">
                                @foreach (\App\Models\Category::all() as $category) <!-- listagem categorias-->
                                    <a class="dropdown-item text-white" href="{{ route('serach-category', $category->id) }}">{{ $category->name }}</a>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarTag" role="button" data-bs-toggle="dropdown">Tags</a>
                            <ul class="dropdown-menu bg-dark" aria-labelledby="navbarTag">
                                @foreach (\App\Models\Tag::all() as $tag)
                                    <a class="dropdown-item text-white" href="{{ route('serach-tag', $tag->id) }}">{{ $tag->name }}</a>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                    <form action="{{ route('serach.product') }}" class="form-group my-0 mx-auto w-50"> <!--busca de produto-->
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Digite o nome do produto" name="s">
                            <div class="input-group-append px-1">
                                <button type="submit" class="input-group-text btn btn-outline-warning">Buscar</button>
                            </div>
                        </div>
                    </form>
                    <ul class="navbar-nav ms-auto">
                        @guest <!-- usando guest para autenticação da pagina -> procurar por Authentication na documentação-->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Registrar</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarUser" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                   <span class="text-warning">Bem vindo </span> {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right bg-dark" aria-labelledby="navbarUser">
                                    @if (Auth::user()->role =="admin")
                                       <a href="{{ route('product.index') }}" class="dropdown-item text-white">ADMIN</a>
                                    @endif
                                        <a href="{{ route('order.index') }}" class="dropdown-item text-white">Pedidos</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-white">Logout</button>
                                    </form>
                                </div>
                            </li>
                        @endguest
                        <button class="btn btn-default rounded">
                            <a href="{{ route('cart.index') }}">
                                <img src="../images/cart.png" width="25" />
                            </a>
                        </button>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="py-4 container bg-light">
        @if (session()->has('success'))
            <div class="alert alert-success">{{ session()->get('success') }}</div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger">{{ session()->get('error') }}</div>
        @endif
        @yield('content')
    </main>
    <div class="bg-dark text-muted  footer">
        <div class="container bg-dark pb-5  pt-3">
            <footer class="row row-cols-5  ">
                <div class="col">
                    <div class="col">
                        <a href="#" class="navbar-brand text-muted ">E-Vortex</a>
                        <p>é um pequeno site de Ecommerce focado na venda de chares do jogo <a href="https://www.tibia.com/account/" class="text-warning">tibia</a></p>
                    </div>
                <p class="text-muted">Criado por Kirbyns&copy; 2022</p>
                </div>

            <div class="col">

            </div>

            <div class="col">
                <h5>Categorias</h5>
                <ul class="nav flex-column">
                    @foreach (\App\Models\Category::all() as $category)
                        <li class="nav-item mb-2"><a href="{{ route('serach-category', $category->id) }}" class="nav-link p-0 text-muted">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="col-4">
                <h5>Tags</h5>
                <ul class="nav d-flex align-content-end flex-wrap">
                    @foreach (\App\Models\Tag::all() as $tag)
                        <li class="btn btn-outline-light mx-1 mb-2 btn-sm"><a href="{{ route('serach-tag', $tag->id) }}" class="nav-link p-0 text-muted">{{ $tag->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </footer>
    </div>

</body>

</html>
