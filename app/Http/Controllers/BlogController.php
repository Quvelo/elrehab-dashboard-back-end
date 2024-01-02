<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Repository\BaseCrudRepo;
use App\Http\Requests\CompanyGoalRequest;

class BlogController  extends BaseCrudRepo
{
    public function setData()
    {
        $this->model = new Blog();
        $this->storeRequest = CompanyGoalRequest::class;
        $this->updateRequest = CompanyGoalRequest::class;
    }
}
