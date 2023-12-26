<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterProject extends Model
{
    use HasFactory;
    const FILE_KEY = '';
    const FOLDER_NAME = "";
    protected $fillable = ['name', 'phone', 'project_id'];
    // public $with = ['project'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
