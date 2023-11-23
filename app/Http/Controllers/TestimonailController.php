<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestimonailRequest;
use App\Models\Testimonail;
use App\Repository\BaseCrudRepo;
use Illuminate\Http\Request;

class TestimonailController extends BaseCrudRepo
{
    public function setData()
    {
        $this->model = new Testimonail();
        $this->storeRequest = TestimonailRequest::class;
        $this->updateRequest = TestimonailRequest::class;
    }
}
