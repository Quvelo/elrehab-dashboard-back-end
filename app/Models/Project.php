<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
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
}
