<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyTeam extends Model
{
    use HasFactory;
    const FILE_KEY = 'image';
    const FOLDER_NAME = "CompanyTeam";
    protected $fillable = [
        'name',
        'image',
        'position',
        'social',
    ];

    protected $casts = [
        'social' => 'json',
    ];
}
