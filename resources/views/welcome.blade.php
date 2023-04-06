<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    {{-- bootstrap --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <style>
        body {
            font-family: 'figtree', cursive;
        }

        .row {
            /* animate */
            animation: animate 1s;

            /* transition */
            transition: all 1s;



        }

        @keyframes animate {
            0% {
                opacity: 0;
                transform: translateY(100px);
            }

            100% {
                opacity: 1;
                transform: translateY(0px);
            }
        }

        .row:hover {
            transform: scale(1.05);
        }
        </style>

</head>

<body class="antialiased">
    {{-- navigation --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Resulab</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Docs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>

            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <div class="container">
        <div class="row m-5">
            <div class="col-md-6">
                <h1 class="display-4">Resulab</h1>
                <p class="lead">
                    This is a simple api to generate resume online.
                </p>
                <a href="#" class="btn btn-primary">Get Started</a>
            </div>
            <div class="col-md-6">
                <img src="https://images.unsplash.com/photo-1586281380349-632531db7ed4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8cmVzdW1lfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                    alt="" class="img-fluid img-thumbnail">
            </div>
        </div>
        {{-- docs --}}
        <div class="row m-5">
            <div class="col-md-6">
                {{-- svg for docs --}}
                <img src="https://images.unsplash.com/photo-1600267204091-5c1ab8b10c02?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                    alt="" class="img-fluid">

            </div>
            <div class="col-md-6">
                <h1 class="display-4">Docs</h1>
                <p class="lead">
                    {{-- some description of the documenation --}}
                    We have a well documented api. follow the link to get started.
                </p>
                <a href="https://documenter.getpostman.com/view/13220146/Tz5qZz8m" class="btn btn-primary">View
                    Documenation</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <h1 class="display-4">Contact</h1>
                <p class="lead">
                    follow the link to get started.
                </p>
                <a href="https://documenter.getpostman.com/view/13220146/Tz5qZz8m" class="btn btn-primary">View
                    Documenation</a>
            </div>
            <div class="col-md-6">
                <img src="https://images.unsplash.com/photo-1520923642038-b4259acecbd7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTd8fGNvbnRhY3R8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60"
                    alt="" class="img-fluid">
            </div>
        </div>
    </body>

    </html>

    {{-- bootstrap js --}}
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>

    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</html>
