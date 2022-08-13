<?php

namespace App\Http\Controllers\ProjectFactory\interfaces;

use App\Http\Requests\StoreProjectRequestByAdmin;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;

interface storeProjectAdmin 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function myProjects();

    
    public function store(StoreProjectRequestByAdmin $request);
    


}
