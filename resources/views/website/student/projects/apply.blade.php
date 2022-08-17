@extends('website.layout')
@section('content')
<div class="container-fluid">
    <nav aria-label="breadcrumb">
    </nav>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-9 shadow-lg p-3 mb-5 bg-body rounded m-3">
            
            <form id="create_project" class="m-5"  method="POST" action="{{route('project.store')}}" role="form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="projects_id" value="{{$project->id}}">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Project Name</label>
                    <input readonly  type="text" placeholder="Project Name" class="form-control" value="{{$project->name}}" id="exampleInputEmail1" name="name">
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Project Description</label>
                    <textarea  readonly placeholder="Project Description" name="description" class="form-control" id="exampleInputPassword1">
                    {{$project->description}}
                    </textarea>
                </div>

                <div class="mb-3">
                    <label for="proposal" class="form-label">Add Project Porposal</label>
                    <input  class="form-control" type="file" id="proposal" name="proposal"  accept="application/pdf,application/vnd.ms-excel">
                </div>
                <div class="mb-3 shadow p-3 mb-5 bg-body rounded members">
                    <label for="students" class="form-label">group ID</label>
                    <button class="btn btn-success ml-3" style="margin-left:10%" id="newMember"> add new member</button>
                    
                    <div class="row mt-3">
                        <div class="col-9 mb-3">
                            <input type="text"  class="form-control" readonly value="{{AuthLogged()->student_ID}}" name="students[]" >
                        </div>
                        
                    </div>
                    <div class="m-1 list-members">
                        @for($i=1 ;$i < 2 ; $i++)

                            <div class="row unique-member">
                                <div class="col-9 mb-3">
                                    <input type="text" placeholder="student ID" class="form-control" id="students" name="students[]" >
                                </div>
                                <div class="col-3">
                                    <button class="btn btn-danger delete-member"> delete</button>
                                </div>
                            </div>

                        @endfor

                    </div>
                </div>
                <div class="mb-3">
                    <label for="doctor" class="form-label">select Supervisor Doctor Name</label>
                   
                    <select class="form-control" id="doctor" name="doctor"  >
                         <option value>Choose</option>
                        @foreach($doctors->where('id',$project->doctors_id) as $doctor)
                            <option value="{{$doctor->id}}" @selected($project->doctors_id == $doctor->id) >{{$doctor->name}}</option>
                        @endforeach
                    </select>
                    @error('doctor')
                        <span class="text-danger error-messages">{{$message}}</span>
                    @enderror
                </div>
                
                <button type="submit" id ="submit" class="btn btn-primary ">
                    
                    <div class="spinner-border  d-none" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    submit 
                </button>
            </form>

        </div>
    </div>
</div>
<script>
   $("#newMember").click(function(e){
        e.preventDefault(); 
        if($('.unique-member').length < 5){
            let element = $('.unique-member:first').clone();
            $('.list-members').append(element)
        }else{
            alert("The maximum number of graduation project team members is 6 members")
        }
    });
    $('body').on("click",".delete-member",function(e){
        e.preventDefault(); 
        if($('.unique-member').length > 1  ){
            $(this).closest('.unique-member').remove();
        }else{
            alert("The minimum number of graduation project team members is 2 members")
        }
    });
    $("body").on('submit','#create_project',function(e){
        e.preventDefault(); 
        let data = new FormData($(this)[0]);

        $.ajax({
            url:$(this).attr('action'),
            data,
            type: 'POST',
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function(){
                $("#submit").attr('disabled',true).find('.spinner-border').removeClass('d-none');
                $('.error-messages').remove();
            },
            success: function(response) {
                location.href="{{route('project.adminApproval')}}"
            },
            error: function(errors) {
                if(errors.status === 422 ){
                    var errors = $.parseJSON(errors.responseText);
                    $.each(errors.errors, function (key, val) {
                        if(key.includes('students')){
                            let inputName = key.split('.')[0];
                            let index = key.split('.')[1];
                            console.log(`input[name='${inputName}[]']:eq(${index})`);
                            $(`input[name='${inputName}[]']:eq(${index})`).closest('div').append(`<span class="text-danger error-messages">${val[0]}</span>`)
                        }
                        // $(`input[name='${key}[]']`).closest('div').append(`<span class="text-danger error-messages">${val[0]}</span>`)
                        $(`input[name='${key}']`).closest('div').append(`<span class="text-danger error-messages">${val[0]}</span>`)
                        $(`select[name='${key}']`).closest('div').append(`<span class="text-danger error-messages">${val[0]}</span>`)
                        $(`textarea[name='${key}']`).closest('div').append(`<span class="text-danger error-messages">${val[0]}</span>`)
                    });
                }else  if(errors.status === 423 ){
                    alert(' You have already registered a project')
                }
                $("#submit").attr('disabled',false).find('.spinner-border').addClass('d-none');
            }
        });

    });
</script>
@endsection