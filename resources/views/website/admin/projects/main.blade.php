@extends('website.layout')
@section('content')

<div class="container text-center">

  
    </div>
    <div class="col-md-9"></div>
   </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-9 m-5 ">
            <div class="row justify-content-center">
                
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;padding:10%">
                        <img  style="height:200px"src="{{asset('Pending_Projects.png')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            
                            <a href="{{route('project.pending')}}" > <h5 class="card-title">Pending Projects</h5></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3   offset-md-1">
                    <div class="card " style="width: 18rem;padding:10%">
                        <img  style="height:200px" src="{{asset('idea.png')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a href="{{route('project.create')}}" > <h5 class="card-title">Add New Projects</h5></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3  offset-md-1 ">
                    <div class="card " style="width: 18rem;padding:10%">
                        <img  style="height:200px" src="{{asset('users.png')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a href="{{route('doctors.index')}}" > <h5 class="card-title"> Doctors and their students</h5></a>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
    </div>
</div>

@endsection