<?php

namespace App\Http\Controllers\ProjectFactory\interfaces;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;

interface storeProjectstudent 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function myProjects();

    
    public function store(StoreProjectRequest $request);
    


}
