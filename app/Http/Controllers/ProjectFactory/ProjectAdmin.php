<?php

namespace App\Http\Controllers\ProjectFactory;

use App\Http\Requests\StoreProjectRequestByAdmin;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Http\Controllers\ProjectFactory\interfaces\storeProjectAdmin;
use Illuminate\Support\Facades\Validator;

class ProjectAdmin implements ProjectInterface,storeProjectAdmin
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('website.admin.projects.list',[
            'projects'=>Project::whereNotNull('suggested_doctors_id')->paginate(10)]);  
    }

    /**
     * Display the main Page of resource
     *
     * @return \Illuminate\Http\Response
     */

    public function main()
    {
        return view('website.admin.projects.main');  
    }

    public function myProjects()
    {
        return view('website.admin.projects.list',[
            'projects'=>Project::where('suggested_doctors_id',AuthLogged()->id)->paginate(10)]);  
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.admin.projects.create');  
    }

    function pendingProject()
    {
        return view('website.admin.projects.pending',[
            'projects'=>Project::where('status','pending')->paginate(10)]);  

    }
    public function apply(Project $project)
    {
        return view('website.student.projects.show',[
            'project'=>$project,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store($request)
    {
        $StoreProjectRequestByAdmin = new StoreProjectRequestByAdmin($request->all());
        $request->validate($StoreProjectRequestByAdmin->rules());
       
        Project::chunk(10,function($projects) use ($request){
            foreach($projects as $project){
                $percent= compareStrings($project->description,$request->description);
                if($percent>=40){
                    abort(488,round($percent,2));
                }
            }
        });
        $Project= Project::updateOrCreate([
            'name'=>$request->name,
            'description'=>$request->description,
        ],[
            'status'=>'suggestByAdmin',
            'create_by'=>0,
            'proposal'=>uploadFile($request->proposal,'proposal'),
            'suggested_doctors_id'=>AuthLogged()->id,
            'created_at'=>now()
        ]);    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('website.admin.projects.show',compact('project'));  
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('website.admin.projects.create');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
