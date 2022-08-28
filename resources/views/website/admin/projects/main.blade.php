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
                
                <div class="col" style="cursor:pointer;" onClick="location.href='{{route('project.pending')}}'">
                    <div class="card" style="width: 18rem;padding:10%">
                        <img  style="height:200px"src="{{asset('Pending_Projects.png')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 style="color: #00264D;" class="text-center card-title">Pending Projects</h5>
                        </div>
                    </div>
                </div>

                <div class="col" style="cursor:pointer;" onClick="location.href='{{route('project.accepted')}}'">
                    <div class="card " style="width: 18rem;padding:10%">
                        <img  style="height:200px" src="{{asset('idea.png')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 style="color: #00264D;" class="text-center card-title">Accepted Projects</h5>
                        </div>
                    </div>
                </div>

                <div class="col" style="cursor:pointer;" onClick="location.href='{{route('project.myProjects')}}'">
                    <div class="card " style="width: 18rem;padding:10%">
                        <img  style="height:200px" src="{{asset('idea.png')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 style="color: #00264D;" class="text-center card-title">Suggested Projects</h5></a>
                        </div>
                    </div>
                </div>

                <div class="col" style="cursor:pointer;" onClick="location.href='{{route('doctors.index')}}'">
                    <div class="card " style="width: 18rem;padding:10%">
                        <img  style="height:200px" src="{{asset('users.png')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 style="color: #00264D;" class="text-center card-title">Projects Details</h5></a>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
    </div>
</div>

@endsection