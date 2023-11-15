<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyGoalRequest;
use App\Models\CompanyGoal;
use App\Repository\BaseCrudRepo;

class CompanyGoalController extends BaseCrudRepo
{
    public function setData()
    {
        $this->model = new CompanyGoal();
        $this->storeRequest = CompanyGoalRequest::class;
        $this->updateRequest = CompanyGoalRequest::class;
    }
}
