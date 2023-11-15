<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyAchievementRequest;
use App\Models\CompanyAchievement;
use Illuminate\Http\Request;
use App\Repository\BaseCrudRepo;

class CompanyAchievementController extends BaseCrudRepo
{
    public function setData()
    {
        $this->model = new CompanyAchievement();
        $this->storeRequest = CompanyAchievementRequest::class;
        $this->updateRequest = CompanyAchievementRequest::class;
    }
}
