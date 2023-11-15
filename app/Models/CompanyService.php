<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyService extends Model
{
    use HasFactory;
    const FILE_KEY = 'logo';
    const FOLDER_NAME = "CompanyService";
    protected $fillable = ['title', 'descritpion', 'logo'];
}
