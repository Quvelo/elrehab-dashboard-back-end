<?php

namespace App\Http\Controllers;

use App\Http\Requests\QARequest;
use App\Models\QA;
use App\Repository\BaseCrudRepo;
use Illuminate\Http\Request;

class QAController  extends BaseCrudRepo
{
    public function setData()
    {
        $this->model = new QA();
        $this->storeRequest = QARequest::class;
        $this->updateRequest = QARequest::class;
    }
}
