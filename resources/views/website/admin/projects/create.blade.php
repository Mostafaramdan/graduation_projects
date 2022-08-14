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
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Project Name</label>
                    <input  type="text" placeholder="Project Name" class="form-control" id="exampleInputEmail1" name="name">
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Project Description</label>
                    <textarea   rows="8" cols="50" placeholder="Project Description" name="description" class="form-control" id="exampleInputPassword1"></textarea>
                </div>

                <div class="mb-3">
                    <label for="proposal" class="form-label">Add Project Porposal</label>
                    <input class="form-control" type="file" id="proposal" name="proposal"  accept="application/pdf,application/vnd.ms-excel">
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
        if($('.unique-member').length < 6){
            let element = $('.unique-member:first').clone();
            $('.list-members').append(element)
        }else{
            alert("The maximum number of graduation project team members is 6 members")
        }
    });
    $('body').on("click",".delete-member",function(e){
        e.preventDefault(); 
        if($('.unique-member').length > 2  ){
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
                location.href="{{route('project.myProjects')}}"
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
                }else  if(errors.status === 488 ){
                    var errors = $.parseJSON(errors.responseText);
                    alert('It is not possible to add this project, because the percentage of quotes from other projects'+errors.message+"%");
                }
                $("#submit").attr('disabled',false).find('.spinner-border').addClass('d-none');
            }
        });

    });
</script>
@endsection