<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name')}}</title>
    <link rel="stylesheet" href="{{asset('bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('style.css')}}">
</head>
<body>
<div class="container-fluid">
    <nav aria-label="breadcrumb">
    </nav>
    <div class="row ">
        <div class="col-md-3"></div>
        <div class="col-md-7 bg-light m-3 shadow-lg p-3 mb-5 bg-body rounded" style="margin-top:10% !important">
            <h4 style="color:#00264d;margin-left:37%;margin-top:10%" >Admin Login</h4>
            <div class="mb-5" style="margin:20px;margin-left:32%">
                <img src="{{asset('logo.png')}}" alt="logo" height="250" width="250" >
            </div>
            <form class="m-4" >
                <div class="mb-3">
                    <label for="Email1" class="form-label">Student ID</label>
                    <input type="text" placeholder="Student ID" class="form-control" id="Email1" aria-describedby="Email1">
                </div>
                <div class="mb-3">
                    <label for="Password1" class="form-label">Password</label>
                    <input type="password" placeholder="Password" class="form-control" id="Password" aria-describedby="Password">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                </div>
                <div class="mb-6 text-center">
                    <button type="submit" class="btn btn-dark" style="width:50%; background-color:#00264d" >login </button>
                </div>
            </form>

        </div>
    </div>
</div>

<script src="{{asset('app.js')}}"></script>
</body>
</html>