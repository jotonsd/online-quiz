<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://bootswatch.com/5/flatly/bootstrap.css" rel="stylesheet">
    <link href="https://bootswatch.com/_vendor/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    {{-- <link href="https://bootswatch.com/_assets/css/custom.min.css" rel="stylesheet"> --}}

    @yield('title')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-warning">
        <div class="container">
            <div>
              <a class="navbar-brand" href="{{route('dashboard.view')}}">
                <img src="{{ asset('img/Quizze.png') }}" alt="" width="50">
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            </div>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::current()->uri == 'dashboard' ? 'active' : '' }}" href="{{route('dashboard.view')}}">Home</a>
                    </li>
                    @if(session('user_role')=='admin')
                        <li class="nav-item">
                            <a class="nav-link {{ Route::current()->uri == 'add-quiz' ? 'active' : '' }}" href="{{route('add.quiz')}}">Add Quiz</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link {{ Str::startsWith(Route::current()->uri, 'quiz') ? 'active' : '' }}" href="{{route('list.quiz')}}">Quiz List </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::current()->uri == 'results' ? 'active' : '' }}" href="{{route('results')}}">Results </a>
                    </li>
                    @if(session('user_role')=='admin')
                        <li class="nav-item">
                            <a class="nav-link {{Str::startsWith(Route::current()->uri, 'inbox') ? 'active' : '' }}" href="{{route('inbox')}}">Inbox</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('logout')}}">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-3">
        @if(session('success'))
            <div class="alert alert-success">
              <strong>{{session('success')}}</strong>
            </div>
        @endif
        @if(session('msg'))

            <div class="alert alert-info">
              <strong>{{session('msg')}}</strong>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
              <strong>{{session('error')}}</strong>
            </div>
        @endif

        @yield('main')
    </div>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>
</html>
