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
        $this->except = ['index', 'show'];
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
            ]);
        if (auth()->user()) {
            $projects = $projects->with('owners', 'images', 'services', 'categories');
        } else {
            $projects = $projects->with('images', 'services', 'categories');
        }
        return response()->json([
            "data" => $projects->get()
            // "data" => $this->model->with('owners','photos', 'services', 'categories')->get()
        ]);
    }

    public function show($id)
    {
        $data = $this->model;
        if (auth()->user()) {
            $data = $data->with('owners', 'images', 'services', 'categories');
        } else {
            $data = $data->with('images', 'services', 'categories');
        }
        return response()->json([
            "data" => $data->find($id)
        ]);
    }
    public function store()
    {
        try {
            DB::beginTransaction();
            $data = app($this->storeRequest)->all();
            if (request()->has('main_photo')) {
                $data['main_photo'] = request()?->file('main_photo')->store($this->folderName, 'public');
            }

            $data = $this->model->create($data);
            $data->services()->attach(request()->services);
            $data->categories()->attach(request()->categories);
            if (request()->has('images')) {
                if (request()->has('images')) {
                    foreach (request()->file('images') as $image) {
                        $data->images()->create([
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
            $model = Project::findOrfail($id);
            $data['main_photo'] = $data['main_photo'] instanceof UploadedFile ?
                request()->file('main_photo')->store($this->folderName, 'public')
                :
                $model['main_photo'];
            if (request()->has('images')) {
                if (request()->has('images')) {
                    foreach (request()->file('images') as $image) {
                        $model->images()->create([
                            "image" => $image['image'] instanceof UploadedFile ?
                                $image['image']->store($this->folderName, 'public')
                                :
                                $model['image']
                        ]);
                    }
                }
            }
            $model->services()->sync(request()->services);
            $model->categories()->sync(request()->categories);
            $data = $model->update($data);
            DB::commit();
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
