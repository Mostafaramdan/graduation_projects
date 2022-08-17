@extends('website.layout')
@section('content')

<div class="container text-center">
    <div class="col-md-9"></div>
   </div>
    <div class="row">
        <div class="col-md-11 m-5 ">
            <div class="row justify-content-center">
                <div class="d-flex align-items-center shadow-lg p-3 mb-5 bg-body rounded">
                    <div class="flex-grow-1 ms-3 " style=" color:#00264d" >
                    <div class="accordion-body">
                        <br>
                        <h3> {{$project->name}}</h3>
                        <br>

                        <p>Project Porposal:  {{$project->description}}</p>
                        <p>
                            
                        </p>
                        <br>
                        <h6 >
                                <i class="fa fa-paperclip"></i>
                                Attached File : {{$project->proposal}}
                                <i class="fa-solid fa-download " style="margin-left:20px;cursor:pointer" onClick="location.href='{{asset($project->proposal)}}'"></i>
                            </h6>
                            <br>
                            <h4>
                                Your Team IDs
                            </h4>
                            <ul class="list-group">
                                
                                @foreach($project->members as $member)
                                    <li >
                                        <h4 style="color: #303030; ">{{$member->name.'     -    '. $member->student_ID}}</h4>
                                    </li>
                                @endforeach
                            </ul>
                            <br>
                            <br>
                            <h4>
                                supervisor doctor name : <a style="color:#d63384">{{$project->doctor->name}}</a>
                            </h4>
                            <!-- <div class="row">
                                <div class="col-md-9 offset-md-3">

                                    <a class="btn  w-25  border border-5 " href="{{route('project.changeStatus',$project->id)}}?status=accept" style="color:#fff; background-color:#00264d">Approve</a>
                                    <button class="btn btn-light w-25 border border-5 border-primary" href="{{route('project.changeStatus',$project->id)}}?status=decline">Decline</button>

                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>              
            </div>
        </div>
    </div>
</div>

@endsection