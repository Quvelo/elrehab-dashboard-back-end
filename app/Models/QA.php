<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QA extends Model
{
    use HasFactory;
    const FILE_KEY = '';
    const FOLDER_NAME = "";
    protected $fillable = [
        'question',
        'answer',
    ];
}
