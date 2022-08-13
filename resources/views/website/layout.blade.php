<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name')}}</title>
    <link rel="stylesheet" href="{{asset('bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <link rel="stylesheet" href="{{asset('style1.css')}}">
    <link rel="stylesheet" href="{{asset('updates.css')}}">
    <script src="{{asset('jquery.js') }}" ></script>
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.css')}}" />
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light fw-bold" >
    <div class="container-fluid">
        <a class="navbar-brand " href="#" >
            <img src="{{asset('logo.png')}}" alt="" width="90" height="82" >
            <span style="font-size:30px">
                {{config('app.name')}}
            </span>
        </a>
        <div class="collapse navbar-collapse" style="margin-left:20%" id="navbarSupportedContent">
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteNamed('project.main') ? 'active' : '' }}" aria-current="page" href="{{route('project.main')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteNamed('project.myProjects') ? 'active' : '' }}" href="{{route('project.myProjects')}}">Your Projects</a>
                </li>
                <li class="nav-item">
                    @if(AuthLogged()->isAdmin())
                        <a class="nav-link {{ Route::currentRouteNamed('project.pending') ? 'active' : '' }}" href="{{route('project.pending')}}">pending Projects</a>
                    @else
                        <a class="nav-link {{ Route::currentRouteNamed('project') ? 'active' : '' }}" href="{{route('project.index')}}">available Projects</a>
                    @endif
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteNamed('project.create') ? 'active' : '' }}" href="{{route('project.create')}}">Add New Project</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" onClick="$('#logout-form').submit()" href="#">logout</a>
                    <form id="logout-form" action="{{ route('website.logout') }}" method="POST" >
                        @csrf
                        <input   type="submit" class="d-none" href="#">
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
@yield('content')
<script src="{{asset('app.js')}}"></script>
</body>
</html>