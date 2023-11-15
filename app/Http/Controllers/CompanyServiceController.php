<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyServiceRequest;
use App\Models\CompanyService;
use App\Repository\BaseCrudRepo;
use Illuminate\Http\Request;

class CompanyServiceController  extends BaseCrudRepo
{
    public function setData()
    {
        $this->model = new CompanyService();
        $this->storeRequest = CompanyServiceRequest::class;
        $this->updateRequest = CompanyServiceRequest::class;
    }
}
