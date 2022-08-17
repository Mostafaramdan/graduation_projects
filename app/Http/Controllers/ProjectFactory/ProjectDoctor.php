<?php

namespace App\Http\Controllers\ProjectFactory;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Doctor;
use App\Models\Student;
use App\Models\ProjectMembers;
use App\Http\Controllers\ProjectFactory\interfaces\storeProjectstudent;
use App\Http\Controllers\ProjectFactory\ProjectInterface;


class ProjectDoctor implements ProjectInterface,storeProjectstudent
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('website.doctor.projects.list',[
            'projects'=>Project::where('doctors_id',AuthLogged()->id)->paginate(10)
        ]);  
    }

    /**
     * Display the main Page of resource
     *
     * @return \Illuminate\Http\Response
     */

    public function main()
    {
        return view('website.doctor.projects.main');  
    }

     /**
     * Display list of projects of this Auth
     *
     * @return \Illuminate\Http\Response
     */

    public function myProjects()
    {
        $projects= Project::where('doctors_id',AuthLogged()->id)->paginate(10);
        return view('website.doctor.projects.list',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.doctor.projects.create',
            [
                'doctors'=>Doctor::all(),
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
        if(AuthLogged()->project->count() || AuthLogged()->members->count()){
            abort(423);
        }
        Project::chunk(10,function($projects) use ($request){
            foreach($projects as $project){
                $percent= compareStrings($project->description,$request->description);
                if($percent>=40){
                    abort(488,round($percent,2));
                }
            }
        });
        $StoreProjectRequest = new StoreProjectRequest($request->all());
        $request->validate($StoreProjectRequest->rules());

        if($request->proposal){
            $file= uploadFile($request->proposal,'proposal');
        }
        $Project= Project::updateOrCreate(['id'=>$request->projects_id],[
            'name'=>$request->name,
            'status'=>'suggestByAdmin',
            'description'=>$request->description,
            'doctors_id'=>AuthLogged()->id,
            'proposal'=>$file??null,
            'suggested_doctors_id'=>AuthLogged()->id,
            'created_at'=>now()
        ]);
        return response(200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('website.doctor.projects.show',compact('project'));  
    }

    public function apply(Project $project)
    {
        return view('website.doctor.projects.apply',[
            'project'=>$project,
            'doctors'=>Doctor::all()
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('website.doctor.projects.edit',compact('project'));  
    }

    function pendingProject()
    {
        return view('website.admin.projects.pending',[
            'projects'=>Project::where('status','pending')->paginate(10)]);  

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
        $project->update([
            'progress'=>$request->progress,
            'social_network'=>$request->social_network
        ]);
        return redirect(route('project.show',$project->id));
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
