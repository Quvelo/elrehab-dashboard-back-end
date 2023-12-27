<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vision extends Model
{
    use HasFactory;
    const FILE_KEY = 'image';
    const FOLDER_NAME = "Vision";
    protected $fillable = [
        'title',
        'description',
        'image',
    ];
}
