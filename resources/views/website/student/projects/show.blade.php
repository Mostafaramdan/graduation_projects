@extends('website.layout')
@section('content')

<div class="container text-center">
    <section class="content-header">
        <div class="container-fluid row d-flex justify-content-center ">
            <div class="alert alert-danger col-sm-6 text-center" role="alert">
                Note that ! <br> 
                The last date for discussion is ( {{date('Y').'-'.$project->last_semester->to??''}} )
            </div>
        </div>
    </section>
    <div class="col-md-9"></div>
   </div>
    <div class="row">
        <div class="col-md-11 m-5 ">
            <div class="row justify-content-center">
                    <div class="d-flex align-items-center shadow-lg p-3 mb-5 bg-body rounded">
                        <div class="flex-grow-1 ms-3 " style=" color:#00264d" >
                            <h3>{{$project->name}}</h3>
                            <br>
                            <br>
                            <h3>Team Leader Name :  {{$project->leader->name}}</h3>
                            <br>
                            <br>
                            <h3>Doctor Name  :  {{$project->doctor->name}}</h3>
                            <br>
                            <br>
                            @if($project->social_network)
                                <h3>Social Network  :  <a target="_blank" href="//{{$project->social_network}}">{{$project->social_network}}</a></h3>
                                <br>
                                <br>
                            @endif

                            <div class="col-md-12 mb-3">
                                <h4>  
                                    <span style='display:block;letter-spacing: 0px;color: #707070;opacity: 1;font: normal normal medium 24px/32px Roboto;'> 
                                        Project progress
                                    </span>
                                    <span style='text-align: left; font: normal normal medium 32px/43px Roboto; letter-spacing: 0px; color: #303030; opacity: 1;'> 
                                        {{$project->progress}}% Complete
                                    </span>
                                </h4>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: {{$project->progress}}%;" aria-valuenow="{{$project->progress}}" aria-valuemin="0" aria-valuemax="100">{{$project->progress}}%</div>
                                </div>
                            </div>
                                <div class="col-md-12">
                                    @include('website.student.projects.components.info')
                                </div>                               
                                <br>
                                <br>
                           
                            <br>
                            <br>
                            
                        </div>
                    </div>
              
            </div>
        </div>
    </div>
</div>

@endsection