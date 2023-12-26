<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Repository\BaseCrudRepo;
use App\Http\Requests\CompanyServiceRequest;

class ServiceController  extends BaseCrudRepo
{
    public function setData()
    {
        $this->model = new Service();
        $this->storeRequest = CompanyServiceRequest::class;
        $this->updateRequest = CompanyServiceRequest::class;
    }
}
