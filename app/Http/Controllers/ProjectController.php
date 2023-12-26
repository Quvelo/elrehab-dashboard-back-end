<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Repository\BaseCrudRepo;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProjectRequest;
use Spatie\QueryBuilder\QueryBuilder;

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
        $projects = QueryBuilder::for(Project::class)
            ->allowedFilters([
                'title',
                'slogan',
                'description',
                'main_photo',
                'video',
                'area',
                'government',
                'location_title',
                'location_google_map',
                'units_number',
                'init_unit_start',
            ])
            ->with('owners', 'images', 'services', 'categories')
            ->get();
        return response()->json([
            "data" => $projects
            // "data" => $this->model->with('owners','photos', 'services', 'categories')->get()
        ]);
    }

    public function show($id)
    {
        $data = $this->model->with('owners', 'images', 'services', 'categories')->find($id);
        return response()->json([
            "data" => $data
        ]);
    }
    public function store()
    {
        try {
            DB::beginTransaction();
            $data = app($this->storeRequest)->all();
            if (request()->has('main_photo') || request()->has('video')) {
                $data['main_photo'] = request()?->file('main_photo')->store($this->folderName, 'public');
                $data['video'] = request()?->file('video')->store($this->folderName, 'public');
            }

            $data = $this->model->create($data);
            $data->services()->attach(request()->services);
            $data->categories()->attach(request()->categories);
            if (request()->has('images')) {
                if (request()->has('images')) {
                    foreach (request()->file('images') as $image) {
                        $data->photos()->create([
                            "image" => $image['image']->store("projects/project_photos", 'public')
                        ]);
                    }
                }
            }
            DB::commit();
            return response()->json([
                "data" => $data
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                "message" => $e->getMessage()
            ], 406);
        }
    }

    public function update($id)
    {
        try {
            DB::beginTransaction();
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
            $data->services()->sync(request()->services);
            $data->categories()->sync(request()->categories);
            return response()->json([
                "message" => "updated"
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                "message" => $e->getMessage()
            ], 406);
        }
    }
}
