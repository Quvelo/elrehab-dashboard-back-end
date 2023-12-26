<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Http\Requests\RegisterProjectRequest;
use App\Models\Project;
use App\Models\RegisterProject;
use App\Repository\BaseCrudRepo;
use Illuminate\Http\Request;

class ProjectOwnerController  extends BaseCrudRepo
{
    public function setData()
    {
        $this->model = new RegisterProject();
        $this->storeRequest = RegisterProjectRequest::class;
        $this->updateRequest = RegisterProjectRequest::class;
    }

    public function projectOwners($id)
    {
        $data = Project::find($id);
        return response()->json([
            "data" => $data->owners
        ]);
    }
}
