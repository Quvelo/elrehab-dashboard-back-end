<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    const FILE_KEY = 'main_photo';
    const FOLDER_NAME = "projects";
    protected $fillable = [
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
    ];

    public function photos()
    {
        return $this->hasMany(ProjectPhoto::class);
    }

    public function owners()
    {
        return $this->hasMany(RegisterProject::class);
    }
    public function services()
    {
        return $this->belongsToMany(Service::class, "project_services", "project_id", "service_id");
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, "project_categories", "project_id", "category_id");
    }
}
