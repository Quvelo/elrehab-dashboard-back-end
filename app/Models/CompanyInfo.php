<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{
    use HasFactory;
    const FOLDER_NAME = "CompanyInfo";
    const FILE_KEY = "nav_logo";
    protected $fillable = [
        'title',
        'name',
        'description',
        'nav_logo',
        'footer_logo',
        'social_media',
        'location',
        'phone',
        'sales_number',
    ];

    protected $casts = [
        'social_media' => 'json',
    ];
}
