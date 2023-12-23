<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Repository\BaseCrudRepo;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\ProjectRequest;

class ProjectController  extends BaseCrudRepo
{
    public function setData()
    {
        $this->model = new Project();
        $this->storeRequest = ProjectRequest::class;
        $this->updateRequest = ProjectRequest::class;
    }

    public function index()
    {
        return response()->json([
            "data" => $this->model->with('user','photos')->get()
        ]);
    }

    public function show($id)
    {
        $data = $this->model->with('user','photos')->find($id);
        return response()->json([
            "data" => $data
        ]);
    }
    public function store()
    {
        $data = app($this->storeRequest)->all();
        if (request()->has('main_photo') || request()->has('video')) {
            $data['main_photo'] = request()?->file('main_photo')->store($this->folderName, 'public');
            $data['video'] = request()?->file('video')->store($this->folderName, 'public');
        }

        $data = $this->model->create($data);
        if (request()->has('images')) {
            if (request()->has('images')) {
                foreach (request()->file('images') as $image) {
                    $data->photos()->create([
                        "image" => $image['image']->store("projects/project_photos", 'public')
                    ]);
                }
            }
        }

        return response()->json([
            "data" => $data
        ]);
    }

    public function update($id)
    {
        $data = app($this->storeRequest)->all();
        $model = $this->model->findOrfail($id);
        $data['main_photo'] = $data['main_photo'] instanceof UploadedFile ?
            request()->file('main_photo')->store($this->folderName, 'public')
            :
            $model['main_photo'];

        $data['video'] = $data['video'] instanceof UploadedFile ?
            request()->file('video')->store($this->folderName, 'public')
            :
            $model['video'];
        if (request()->has('images')) {
            $model->photos()->delete();
            if (request()->has('images')) {
                foreach (request()->file('images') as $image) {
                    $model->photos()->create([
                        "image" => $image['image']->store("projects/project_photos", 'public')
                    ]);
                }
            }
        }
        $data = $model->update($data);
        return response()->json([
            "message" => "updated"
        ]);
    }
}
