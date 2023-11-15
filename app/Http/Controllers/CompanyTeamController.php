<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyTeamRequest;
use App\Models\CompanyTeam;
use App\Repository\BaseCrudRepo;
use Illuminate\Http\Request;

class CompanyTeamController  extends BaseCrudRepo
{
    public function setData()
    {
        $this->model = new CompanyTeam();
        $this->storeRequest = CompanyTeamRequest::class;
        $this->updateRequest = CompanyTeamRequest::class;
    }
}
