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
            <h4 style="color:#00264d;margin-left:37%;margin-top:10%" >Graduation Projects Registration</h4>
            <div class="mb-5" style="margin:20px;margin-left:32%">
                <img src="{{asset('logo.png')}}" alt="logo" height="250" width="250" >
            </div>
            <form class="m-4" action="{{route('post.login')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Select Type</label>
                   <select name="type"  class="form-control" id="type">
                        <option value="Doctor">Doctor</option>
                        <option value="Admin">Admin</option>
                        <option value="Student">Student</option>
                   </select>
                </div>
                <div class="mb-3 ">
                    <label for="username" class="form-label">User Name</label>
                    <input type="text" placeholder="Student ID" class="form-control" name="username" aria-describedby="username">
                    <div class="invalid-feedback">
                        Please Enter valid username.
                    </div>
                    <div class="valid-feedback">
                        Ok
                    </div>
                </div>
                <div class="mb-3">
                    <label for="Password1" class="form-label">Password</label>
                    <input type="password" placeholder="Password" class="form-control" name="password" aria-describedby="Password">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                </div>
                @include('website.session')
                <div class="mb-6 text-center">
                    <button type="submit" class="btn btn-dark" disabled style="width:50%; background-color:#00264d" id="login">login </button>
                </div>
            </form>

        </div>
    </div>
</div>

<script src="{{asset('app.js')}}"></script>
<script src="{{asset('jquery.js') }}" ></script>

<script>
    $("body").on('input',"input[name='username'],#type",function(){
        let username= $(this).val();
        let type= $("#type").val();
        let isValid= window[`validation${type}`]();
        $("#login").attr('disabled',!isValid)
        if(isValid)
            $("input[name='username']").addClass('is-valid').removeClass('is-invalid')
        else
            $("input[name='username']").removeClass('is-valid').addClass('is-invalid')
    });

    function validationStudent(){
        let username= $("input[name='username']").val();
        let check = 0; // we will check over 3 steps 
        if(username.includes('@hti.edu.eg') ) check++;
        if(username.split('@')[0].length == 8 ) check++;
        if(username.startsWith(4)  ) check++;
        return check == 3;
    }
    function validationAdmin(){
        let username= $("input[name='username']").val();
        let check = 0; // we will check over 3 steps 
        if(username.includes('@hti.edu.eg') ) check++;
        return check == 1;
    }

    function validationDoctor(){
        let username= $("input[name='username']").val();
        let check = 0; // we will check over 3 steps 
        if(username.includes('@hti.edu.eg') ) check++;
        return check == 1;
    }
</script>
</body>
</html>