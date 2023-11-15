<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Repository\BaseCrudRepo;

class CategoryController extends BaseCrudRepo
{
    public function setData()
    {
        $this->model = new Category();
        $this->storeRequest = CategoryRequest::class;
        $this->updateRequest = CategoryRequest::class;
    }
}
