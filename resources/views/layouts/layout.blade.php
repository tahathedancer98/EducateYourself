<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{--
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    --}}
    <style>
        #listCards:hover{
            box-shadow: 5px 5px 5px #2d3748;
            transform: scale(1.1);

        }
        #listCards{
            text-align: center;
            text-decoration: none;
            background-color: #312742;
            color:white;
        }
        #headerVisiteurs{
            background-image:linear-gradient(#74D8C3, #312742);
            margin-left: 0em;
            margin-right: 4em;
            color:#e3f2fd;
        }
        .chapitres:hover{
            background-color: #4a5568;
            color: white;
        }
        #chapitre{
            color: white;
        }
        #chapitre:hover{
            background-color: white;
            color: black;
        }
    </style>
    <title>EducateYoursef</title>
</head>
<body>
<!-- Header -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark" style="margin-bottom: 3em;">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('homeView')}}">EducateYourself</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::User()->is_admin != null)
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="{{route('categoriesList')}}" class="btn btn-outline-success" style="margin-right: 3px">
                                Catégories
                            </a>
                        </li>
                        <li>
                            <a href="{{route('chapitresList')}}" class="btn btn-outline-success" style="margin-right: 3px">
                                Chapitres
                            </a>
                        </li>
                    </ul>
                @endif

                @if(\Illuminate\Support\Facades\Auth::check())
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="{{route('formationList')}}" class="btn btn-outline-success" style="margin-right: 3px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                                    <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                                </svg>
                                Formations
                            </a>
                        </li>

                        <li class="nav-item">{{\Illuminate\Support\Facades\Auth::User()->firstname}}</li>
                        <li class="nav-item">
                            <a href="{{route('profilRoute',\Illuminate\Support\Facades\Auth::User()->id)}}" class="btn btn-outline-success" style="margin-right: 3px">
                                Profil
                            </a>
                        </li>
                        <li class="nav-item">
                            <form method="post" action="{{route('logout')}}">
                                @csrf
                                <button type="submit" class="btn btn-danger">Déconnexion</button>
                            </form>
                        </li>
                    </ul>

                @else
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="{{route('formationListVisiteurs')}}" class="btn btn-outline-success" style="margin-right: 3px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                                    <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                                </svg>
                                Formations
                            </a>
                        </li>
                        <li>
                            <a href="{{route('login')}}" class="btn btn-outline-success ">
                                <span class="glyphicon glyphicon-log-in"></span>
                                Se connecter
                            </a>
                        </li>
                        <li>
                            <a class="btn btn-outline-success" href="{{route('contact')}}">
                                <span class="glyphicon glyphicon-user"></span>
                                Contact
                            </a>
                        </li>
                    </ul>
                @endif
            </ul>

        </div>
    </div>
</nav>
<!-- Header -->

<!-- Body -->
@yield('content')

    @if(session('success'))
        <div class="col-md-4 offset-md-4">
            <div class="login-form bg-light mt-4 p-4">
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @endif
    @if(session('error'))
        <div class="col-md-4 offset-md-4">
            <div class="login-form bg-light mt-4 p-4">
                <div class="alert alert-success">
                    {{ session('error') }}
                </div>
            </div>
        </div>
    @endif
<!-- Body -->

<!-- Footer -->
<footer class="bg-dark text-center text-white" style="margin-top: 3em;">
    <!-- Grid container -->
    <div class="container p-4">
        <!-- Section: Social media -->
        <section class="mb-4">

            <!-- Linkedin -->
            <a class="btn btn-outline-light btn-floating m-1"
               href="https://www.linkedin.com/in/tahatoufik"
               target="_blank"
               role="button"
            ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                    <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                </svg></a>

            <!-- Github -->
            <a class="btn btn-outline-light btn-floating m-1"
               href="https://github.com/tahathedancer98/"
               target="_blank"
               role="button"
            ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                    <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                </svg></a>
        </section>
        <!-- Section: Social media -->

        <!-- Section: Text -->
        <section class="mb-4">
            <p>
                Ceci est la réalisation du projet FORMATION que j'ai nommé EducateYoursef durant ma formation <b>Master 1</b> en <i>alternance</i> à l'école <i>H3 Hitema</i>.
            </p>
        </section>
        <!-- Section: Text -->

        <!-- Section: Links -->
        <section class="">
            <!--Grid row-->
            <div class="row">
                <div class="col-12" style="float: left;">
                    <h4>Technologies utilisées</h4>
                </div>
                <div class="col-12" style="float: left;">
                    <ul class="list-unstyled mb-0">
                        <a href="https://www.php.net/" target="_blank" class="btn btn-dark">PHP</a>
                        <a href="https://laravel.com/" target="_blank" class="btn btn-dark">LARAVEL</a>
                        <a href="https://www.mysql.com/fr/" target="_blank" class="btn btn-dark">MYSQL</a>
                        <a href="https://getbootstrap.com/" target="_blank" class="btn btn-dark">BOOTSTRAP</a>
                    </ul>
                </div>
                <!--Grid column-->

                <!--Grid column-->
            </div>
            <!--Grid row-->
        </section>
        <!-- Section: Links -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2021 Copyright:
        <a class="text-white" href="https://github.com/tahathedancer98/ProjetLaravelM1/tree/master">CODE SOURCE</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
