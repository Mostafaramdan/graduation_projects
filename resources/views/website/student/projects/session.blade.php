@if($project->last_semester)
    <section class="content-header">
        <div class="container-fluid row d-flex justify-content-center ">
            <div class="alert alert-danger col-sm-6 text-center" role="alert">
                Note that ! <br> 
                The last semester for discussion is ( {{$project->last_semester->name}} )
            </div>
        </div>
    </section>
@endif