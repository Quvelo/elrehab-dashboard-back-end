<?php

namespace App\Repository;

use App\Models\Client;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

abstract class BaseCrudRepo extends Controller
{

    protected $model, $storeRequest, $updateRequest;
    protected $fileName, $folderName, $except;

    public function __construct()
    {
        $this->setData();
        $this->middleware('auth')->except($this->except ?? 'index');
        $this->fileName = $this->model::FILE_KEY;
        $this->folderName = $this->model::FOLDER_NAME;
    }
    abstract function setData();

    public function index()
    {
        $this->middleware('auth:api');
        return response()->json([
            "data" => $this->model->get()
        ]);
    }

    public function store()
    {
        $data = app($this->storeRequest)->all();
        if (request()->has($this->fileName)) {
            $data[$this->fileName] = request()->file($this->fileName)->store($this->folderName, 'public');
        }
        $data = $this->model->create($data);
        return response()->json([
            "data" => $data
        ]);
    }

    public function show($id)
    {
        $data = $this->model->find($id);
        return response()->json([
            "data" => $data
        ]);
    }


    public function update($id)
    {
        $data = app($this->storeRequest)->all();
        $model = $this->model->findOrfail($id);
        if (request()->has($this->fileName)) {
            $data[$this->fileName] = $data[$this->fileName] instanceof UploadedFile ?
                request()->file($this->fileName)->store($this->folderName, 'public')
                :
                $model[$this->fileName];
        }
        $data = $model->update($data);
        return response()->json([
            "message" => "updated"
        ]);
    }

    public function destroy($id)
    {
        $model = $this->model->findOrFail($id);
        if ($this->fileName) {
            // File::delete(public_path($model->$this->fileName));
        }
        $model->delete();
        return response()->json([
            "message" => "deleted"
        ]);
    }
}
