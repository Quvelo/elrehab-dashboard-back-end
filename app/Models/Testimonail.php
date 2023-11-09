<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonail extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_name',
        'logo',
        'person_name',
        'person_position',
        'description',
        'starts',
    ];

}
