<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Help Center</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
          integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}"><i class="fas fa-home"></i></a>
                        </li>

                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('user.help') }}"><i class="fas fa-info-circle"></i></a>
                        </li>

                        @if(Auth::user()->is_admin == 1)

                            <li class="nav-item">
                                <a class="nav-link" href="/admin">
                                    <i class="fas fa-tachometer-alt"></i>
                                </a>
                            </li>

                        @endif

                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <style>
        .helpcenter-home {
            text-align: center;
        }
    </style>

    <div class="jumbotron bg-info text-white helpcenter-home">
        <div class="container">
            <h1 style="font-family: 'American Typewriter'; font-size: 4em">How can we help you?</h1>

            <form action="" style="padding-top: 25px">
                <input class="form-control form-control-lg" type="text" placeholder="Search help articles">
            </form>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <h1>Help Articles</h1>
                <p>Please start by selecting a category.</p>
                <div class="row">
            @if(App\Category::all()->count() > 0)
                <div class="col-md-4">
                    <!-- List group -->
                    <div class="list-group" id="myList" role="tablist">
                        @foreach(App\Category::all() as $category)
                            <a class="list-group-item list-group-item-action" data-toggle="list"
                               href="#category{{ $category->id }}" role="tab">{{ $category->name }}</a>
                        @endforeach
                    </div>
                </div>

                    <div class="col-md-8">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        @foreach(App\Category::all() as $category)
                            <div class="tab-pane" id="category{{ $category->id }}" role="tabpanel">
                                @if($category->articles()->count() > 0)
                                    @foreach($category->articles as $article)
                                        <div class="card">
                                            <div class="card-body">
                                                <h1>{{ $article->title }}</h1>
                                                <a class="btn btn-outline-primary">Read</a>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="alert alert-info">
                                        <b>We appologize!</b> This category has no articles
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                    </div>

                @else

                <div class="alert alert-info">
                    <b>Sorry!</b> We have no articles at this time! Check back later!
                </div>

                @endif

                </div>

            </div>
            <div class="col-md-4">
                <h3>Here is your account information...</h3>
                <div class="card">
                    <div class="card-body">
                        <h3><i class="far fa-user"></i> {{ Auth::user()->name }} <span
                                    class="badge badge-pill badge-primary">{{ Auth::user()->plan }}</span></h3>
                        <hr>

                        <p><i class="far fa-building"></i> {{ Auth::user()->company }}</p>

                        <p><i class="fas fa-link"></i> {{ Auth::user()->domain }}</p>

                        <p><i class="fas fa-envelope"></i> {{ Auth::user()->email }}</p>

                        <p><i class="fas fa-phone"></i> {{ Auth::user()->phone }}</p>

                        <p><i class="fab fa-slack"></i> {{ Auth::user()->slackURL }}</p>

                    </div>
                </div>
                <hr>
                <h3>Can't find what you're looking for?</h3>
                <p>Please submit a request and we'll get back to you as soon as we possibly can!</p>
                <div class="card">
                    <div class="card-body">
                        <form action="">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" class="form-control" type="text" readonly name="name"
                                       value="{{ Auth::user()->name }}">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" class="form-control" type="text" readonly name="email"
                                       value="{{ Auth::user()->email }}">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</body>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

<!-- Start of HubSpot Embed Code -->
<script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/4754507.js"></script>
<!-- End of HubSpot Embed Code -->