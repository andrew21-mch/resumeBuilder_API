<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Resulab') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    {{-- bootstrap --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        {{-- font awesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'figtree', cursive;
        }

        .row {
            /* animate */
            animation: animate 1s;
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

        @media (max-width: 768px) {
            .row {
                transform: scale(1);
            }
        }

        /* general scroll speed */
        html {
            scroll-behavior: smooth;
        }


        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }
    </style>

</head>

<body class="antialiased">
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
        <a class="navbar-brand" href="#">Resulab</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#docs">Docs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>

            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <div class="container mt-9">
        <div class="row m-5">
            <div class="col-md-6">
                <h1 class="display-4">Resulab</h1>
                <p class="lead">
                    We prepare you for your next interview,
                    we have a well documented api. follow the link to get started.
                </p>
                <a href="https://interstellar-robot-966971.postman.co/workspace/My-Workspace~73d79d56-8070-49a0-8d8d-92ae5e5d14b2/api/9e3c345b-13c4-43d0-b7c7-ad6532a02679" class="btn btn-primary">Get Started</a>
            </div>
            <div class="col-md-6">
                <img src="https://images.unsplash.com/photo-1586281380349-632531db7ed4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8cmVzdW1lfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop"
                    alt="" class="img-fluid img-thumbnail">
            </div>
        </div>
        {{-- docs --}}
        <div class="row m-5" id="docs">
            <div class="col-md-6">
                {{-- svg for docs --}}
                <img src="https://images.unsplash.com/photo-1623282033815-40b05d96c903?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8YXBpfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                    alt="" class="img-fluid img-thumbnail">

            </div>
            <div class="col-md-6">
                <h1 class="display-4">Docs</h1>
                <p class="lead">
                    {{-- some description of the documenation --}}
                    We have a well documented api. follow the link to get started.
                </p>
                <a href="https://interstellar-robot-966971.postman.co/workspace/My-Workspace~73d79d56-8070-49a0-8d8d-92ae5e5d14b2/api/9e3c345b-13c4-43d0-b7c7-ad6532a02679" class="btn btn-primary" target="_blank">
                    Documenation</a>
            </div>
        </div>
    </div>
    {{-- our team --}}
    {{-- row of team mebmers --}}
    <div class="team container-fluid bg-light" id="contact">
        <h2 class="text-center m-auto mt-5">Our Team</h2>
        <hr class="w-25 mx-auto">
        <div class="row m-5">
            <div class="col-md-3">
                <img src="https://images.unsplash.com/photo-1623282033815-40b05d96c903?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8YXBpfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                    alt="" class="img-fluid img-thumbnail">
                <h3 class="text-center">John Doe</h3>
                <p class="text-center">CEO</p>

            </div>
            <div class="col-md-3">
                <img src="https://images.unsplash.com/photo-1623282033815-40b05d96c903?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8YXBpfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                    alt="" class="img-fluid img-thumbnail">
                <h3 class="text-center">John Doe</h3>
                <p class="text-center">CEO</p>
            </div>

            <div class="col-md-3">
                <img src="https://images.unsplash.com/photo-1623282033815-40b05d96c903?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8YXBpfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                    alt="" class="img-fluid img-thumbnail">
                <h3 class="text-center">John Doe</h3>
                <p class="text-center">CEO</p>
            </div>

            <div class="col-md-3">
                <img src="https://images.unsplash.com/photo-1623282033815-40b05d96c903?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8YXBpfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                    alt="" class="img-fluid img-thumbnail">
                <h3 class="text-center">John Doe</h3>
                <p class="text-center">CEO</p>
            </div>
        </div>
    </div>
    <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
        <!--Section description-->
        <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us
            directly. Our team will come back to you within
            a matter of hours to help you.</p>

        <div class="row m-5 shadow-lg p-3 mb-5 bg-white rounded p-5">

            <!--Grid column-->
            <div class="col-md-9 mb-md-0 mb-5">
                <form id="contact-form" name="contact-form" action="{{route('home')}}" method="GET">

                    <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <input type="text" id="name" name="name" class="form-control">
                                <label for="name" class="">Your name</label>
                            </div>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <input type="text" id="email" name="email" class="form-control">
                                <label for="email" class="">Your email</label>
                            </div>
                        </div>
                        <!--Grid column-->

                    </div>
                    <!--Grid row-->

                    <!--Grid row-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form mb-0">
                                <input type="text" id="subject" name="subject" class="form-control">
                                <label for="subject" class="">Subject</label>
                            </div>
                        </div>
                    </div>
                    <!--Grid row-->

                    <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-12">

                            <div class="md-form">
                                <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                                <label for="message">Your message</label>
                            </div>

                        </div>
                    </div>
                    <!--Grid row-->

                </form>

                <div class="text-center text-md-left">
                    <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Send</a>
                </div>
                <div class="status"></div>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-3 text-center">
                <ul class="list-unstyled mb-0">
                    <li><i class="fas fa-map-marker-alt fa-2x"></i>
                        <p>Bamenda, Cameroon</p>
                    </li>

                    <li><i class="fas fa-phone mt-4 fa-2x"></i>
                        <p>+ 237 681 610 98</p>
                    </li>

                    <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                        <p>info@resulab.com</p>
                    </li>
                </ul>
            </div>
            <!--Grid column-->

        </div>

    {{-- footer --}}
    <footer class="bg-dark text-white mt-5 p-4 text-center">
        <p>Resulab &copy;
            <script>
                document.write(new Date().getFullYear());
            </script>
        </p>
    </footer>
</body>

</html>

{{-- bootstrap js --}}
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>

{{-- jquery --}}
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

</html>
