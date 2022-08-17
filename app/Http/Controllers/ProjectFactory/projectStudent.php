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


class projectStudent implements ProjectInterface,storeProjectstudent
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('website.student.projects.list',[
            'projects'=>Project::where('status','suggestByAdmin')->paginate(10)
        ]);  
    }

    /**
     * Display the main Page of resource
     *
     * @return \Illuminate\Http\Response
     */

    public function main()
    {
        return view('website.student.projects.main');  
    }

     /**
     * Display list of projects of this Auth
     *
     * @return \Illuminate\Http\Response
     */

    public function myProjects()
    {
        if(AuthLogged()->project->count())
            return view('website.student.projects.show',['project'=>AuthLogged()->project->first()->load('members')]);  
        
            return redirect(route('project.create'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.student.projects.create',
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
                    abort(424,round($percent,2));
                }
            }
        });

        ### check if doctor exceed limit of students;
        $doctor= Doctor::find($request->doctor);
        $projectsOfDoctor= Project::where('doctors_id',$request->doctor)->get();
        if(ProjectMembers::whereIn('projects_id',$projectsOfDoctor->pluck('id'))->count() +count($request->students)  >=21){
            abort(431);
        }

        $StoreProjectRequest = new StoreProjectRequest($request->all());
        $request->validate($StoreProjectRequest->rules());

        $Project= Project::updateOrCreate(['id'=>$request->projects_id],[
            'name'=>$request->name,
            'status'=>'pending',
            'description'=>$request->description,
            'doctors_id'=>$request->doctor,
            'proposal'=>uploadFile($request->proposal,'proposal'),
            'create_by'=>AuthLogged()->id,
            'created_at'=>now()
        ]);
        $data=[];
        foreach($request->students as $studentID){
            $data[]=[
                'students_id'=>(Student::firstWhere('student_ID',$studentID))->id,
                'projects_id'=>$Project->id
            ];
        }
        ProjectMembers::insert($data);
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
        return view('website.student.projects.create');  
    }

    public function apply(Project $project)
    {
        return view('website.student.projects.apply',[
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
        return view('website.student.projects.create');  
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
