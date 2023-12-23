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
        'user_id',
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

    public function photos(){
        return $this->hasMany(ProjectPhoto::class);
        }

        public function user(){
            return $this->belongsTo(User::class);
            }
}
