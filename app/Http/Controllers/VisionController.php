<?php

namespace App\Http\Controllers;

use App\Models\Vision;
use Illuminate\Http\Request;
use App\Repository\BaseCrudRepo;
use App\Http\Requests\CompanyGoalRequest;

class VisionController  extends BaseCrudRepo
{
    public function setData()
    {
        $this->model = new Vision();
        $this->storeRequest = CompanyGoalRequest::class;
        $this->updateRequest = CompanyGoalRequest::class;
    }
}
