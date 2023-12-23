<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyInfoRequest;
use App\Http\Requests\UpdateCompanyInfoRequest;
use App\Models\CompanyInfo;
use App\Repository\BaseCrudRepo;
use Illuminate\Http\UploadedFile;

class CompanyInfoController  extends BaseCrudRepo
{
    public function setData()
    {
        $this->model = new CompanyInfo();
        $this->storeRequest = StoreCompanyInfoRequest::class;
        $this->updateRequest = UpdateCompanyInfoRequest::class;
    }

    public function store()
    {
        $data = app($this->storeRequest)->all();
        if (request()->has('nav_logo') || request()->has('footer_logo')) {
            $data['nav_logo'] = request()?->file('nav_logo')?->store($this->folderName, 'public');
            $data['footer_logo'] = request()?->file('footer_logo')?->store($this->folderName, 'public');
        }
        $data = $this->model->create($data);
        return response()->json([
            "data" => $data
        ]);
    }

    public function update($id)
    {
        $data = app($this->storeRequest)->all();
        $model = $this->model->findOrfail($id);
        if (request()->has('nav_logo')) {
            $data['nav_logo'] = $data['nav_logo'] instanceof UploadedFile ?
                request()?->file('nav_logo')?->store($this->folderName, 'public')
                :
                $model['nav_logo'];
        }
        if (request()->has('footer_logo')) {
            $data['footer_logo'] = $data['footer_logo'] instanceof UploadedFile ?
                request()?->file('footer_logo')?->store($this->folderName, 'public')
                :
                $model['footer_logo'];
        }
        $data = $model->update($data);
        return response()->json([
            "message" => "updated"
        ]);
    }
}
