@extends('website.layout')
@section('content')

<div class="container text-center">

  
    </div>
    <div class="col-md-9"></div>
   </div>
    <div class="row">
        <div class="col-md-11 m-5 ">
            <div class="row justify-content-center">
               
                @if($doctors->count() > 0)

                    @foreach($doctors as $doctor)
                        <div class="d-flex align-items-center shadow-lg p-3 mb-5 bg-body rounded">
                            <div class=" ">
                                <img src="{{asset('users.png')}}" alt="idea" height="150" width="150" class="rounded float-start shadow-lg p-3 mb-5 bg-body rounded" style="border-radius:50% !important">
                            </div>
                            <div class="flex-grow-1 ms-3 " style=" color:#00264d" >
                                <h3>{{$doctor->name}} - ({{$project->status}})</h3>
                                <p>
                                    @foreach($doctor->projects as $project )
                                        <div class="list-group m-4">
                                            <button type="button" class="list-group-item list-group-item-action " aria-current="true">
                                                The Project Name :  <a href="{{route('project.show',$project->id)}}">{{$project->name }}</a> 
                                            </button>
                                            @foreach($project->members as $member)
                                                <button type="button" class="list-group-item list-group-item-action" disabled>
                                                        <h4 style="color: #303030; ">{{$member->name.'     -    '. $member->student_ID}}</h4>
                                                </button>
                                            @endforeach
                                        </div>
                                    @endforeach
                            </div>
                            
                        </div>
                    @endforeach
                    {{ $doctors->links('website.paginator') }}
                @else
                    <h2 class="text-center">There are no doctors</h2>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection