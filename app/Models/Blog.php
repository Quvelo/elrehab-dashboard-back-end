<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    const FILE_KEY = 'image';
    const FOLDER_NAME = "achievement";
    protected $fillable = [
        'title',
        'description',
        'image',
    ];
}
