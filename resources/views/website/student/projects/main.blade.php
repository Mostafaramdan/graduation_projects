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
                @if($project)
               
                    <div class="col-md-12 mb-3">
                        <section class="content-header">
                            <div class="container-fluid row d-flex justify-content-center ">
                                <div class="alert alert-danger col-sm-6 text-center" role="alert">
                                    Note that ! <br> 
                                    The last date for discussion is ( {{date('Y').'-'.$project->last_semester->to??''}} )
                                </div>
                            </div>
                        </section>

                        <h4>Your Project Status <span style='color:yellow;'> In Progress</span></h4>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{$project->progress}}%;" aria-valuenow="{{$project->progress}}" aria-valuemin="0" aria-valuemax="100">{{$project->progress}}%</div>
                        </div>
                    </div>

                @endif

                <div class="col-md-3 offset-md-1" style="cursor:pointer" onClick="location.href='{{route('project.myProjects')}}'">
                    <div class="card" style="width: 18rem;padding:10%">
                        <img style="height:250px" src="{{asset('create_project.png')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 style="color: #00264D;" class="text-center card-title">Your Projects</h5>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 offset-md-1" style="cursor:pointer;" onClick="location.href='{{route('project.index')}}'">
                    <div class="card" style="width: 18rem;padding:10%">
                        <img style="height:250px" src="{{asset('Available_Projects.png')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 style="color: #00264D;" class="text-center card-title">Available Projects</h5>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 offset-md-1" style="cursor:pointer" onClick="location.href='{{route('project.create')}}'">
                    <div class="card" style="width: 18rem;padding:10%">
                        <img style="height:250px" src="{{asset('idea.png')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 style="color: #00264D;" class="text-center card-title">Add New Project</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection