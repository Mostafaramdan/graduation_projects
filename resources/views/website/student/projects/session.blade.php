@if($project->last_semester)
    <section class="content-header">
        <div class="container-fluid row d-flex justify-content-center ">
            <div class="alert alert-danger col-sm-6 text-center" role="alert">
                Note that ! <br> 
                The last date for discussion is ( {{date('Y').'-'.$project->last_semester->to??''}} )
            </div>
        </div>
    </section>
@endif