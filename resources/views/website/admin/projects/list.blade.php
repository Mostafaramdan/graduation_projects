@extends('website.layout')
@section('content')

<div class="container text-center">

  
    </div>
    <div class="col-md-9"></div>
   </div>
    <div class="row">
        <div class="col-md-11 m-5 ">
            <div class="row justify-content-center">
               
                @if($projects->count() > 0)

                    @foreach($projects as $project)
                        <div class="d-flex align-items-center shadow-lg p-3 mb-5 bg-body rounded">
                            <div class=" ">
                                <img src="{{asset('idea.png')}}" alt="idea" height="150" width="150" class="rounded float-start shadow-lg p-3 mb-5 bg-body rounded" style="border-radius:50% !important">
                            </div>
                            <div class="flex-grow-1 ms-3 " style=" color:#00264d" >
                                <h3>{{$project->name}} </h3>
                                <p>
                                {{$project->description}}
                                </p> 
                                <div class="d-flex justify-content-center m-5">

                                    <a href="{{route('project.show',$project->id)}}" class="btn btn-block w-25 center-text " style=" background-color:#00264d;color:#fff"> preview This Project</a>
                                </div>

                            </div>
                        </div>
                    @endforeach
                    {{ $projects->links('website.paginator') }}
                @else
                    <h2 class="text-center">There are no projects</h2>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection