<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    const FILE_KEY = '';
    const FOLDER_NAME = "";
    protected $fillable = ['name','phone','email','subject','message'];


}
