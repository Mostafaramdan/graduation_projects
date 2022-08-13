<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Doctor;
use App\Http\Controllers\ProjectFactory\ProjectFactory;
use Illuminate\Http\Request;

class ProjectController extends Controller
{ 
    private  $ProjectFactory;

    /**
     * set project class.
     *
     * @return \Illuminate\Http\Response
    */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->ProjectFactory= ProjectFactory::index();
            return $next($request);
        });
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return $this->ProjectFactory->index();
    }


    public function main()
    {
        return $this->ProjectFactory->main();
    }

    public function myProjects()
    {
        return $this->ProjectFactory->myProjects();
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->ProjectFactory->create();
    }

    public function apply(Project $project)
    {
        return $this->ProjectFactory->apply($project);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->ProjectFactory->store($request);
    }

    public function pendingProject(Request $request)
    {
        return $this->ProjectFactory->pendingProject();
    }

    public function changeStatus(Request $request,Project $project)
    {
        $project->update(['status'=>$request->status]);
        return redirect(route('project.pending'));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return $this->ProjectFactory->show($project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
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
