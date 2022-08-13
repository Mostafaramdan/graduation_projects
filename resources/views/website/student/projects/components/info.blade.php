<section id="info-utile" class="bg-white py-5">
    <div class="container">

        <div class="accordion" id="accordionExample">
            <div class="row">
                <div class="col-md-6">

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Project Info
                        </button>
                        </h2>
                        
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Updates
                        </button>
                        </h2>                
                    </div>
                </div>
            </div>
        </div>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
               <h3>Project Porposal:</h3>
               <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                Why do we use it?
                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
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
            </div>
        </div>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="mb-3">
                    <div class="row mt-5">
                        <div class="col-9 ">
                            <input  placeholder="type your comment" class="form-control" id="typeComment"></textarea>
                        </div>
                        <div class="col-3">
                            <button class="btn w-25 center-text " style=" background-color:#00264d;color:#fff"> Send</button>
                        </div>
                        <div class="col-md-12">
                            @include('website.student.projects.components.updates')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $("body").on("click",'.accordion-item',function(){

            
            $(".accordion-collapse.show").attr("class","accordion-collapse collapse").find('.collapsed').css('color','#f2f2f2');   // not selector

        });
    </script>

</section>