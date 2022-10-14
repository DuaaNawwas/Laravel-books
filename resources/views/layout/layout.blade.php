<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'untitled')</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet" />

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white mb-2">
            <div class="container">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" aria-current="page" href="/">Home</a>
                    </li>
                </ul>

                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                    data-mdb-target="#navbarExample01" aria-controls="navbarExample01" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <div class="d-flex align-items-center">
                    <div class="collapse navbar-collapse" id="navbarExample01">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-center">
                            @auth
                                <li class="nav-item ">
                                    <span class="nav-link"><i class="fa-solid fa-door-open"></i>
                                        Welcome {{ auth()->user()->name }}</span>
                                </li>
                                <li class="nav-item">
                                    <form method="post" action="/logout">
                                        @csrf
                                        <button type="submit" class="nav-link btn btn-link text-dark"
                                            data-mdb-ripple-color="light">
                                            <i class="fa-solid fa-door-closed"></i>
                                            Logout
                                        </button>
                                    </form>
                                </li>
                            @else
                                <li class="nav-item ">
                                    <a class="nav-link" href="/login"><i class="fa-solid fa-right-to-bracket"></i>
                                        Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/register"><i class="fa-sharp fa-solid fa-user-plus"></i>
                                        Signup</a>
                                </li>
                            @endauth
                        </ul>
                    </div>

                </div>

            </div>
        </nav>
    </header>
    @yield('content')

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>

</body>

</html>
