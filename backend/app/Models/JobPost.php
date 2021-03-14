<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'job_location',
        'url',
        'company_name',
        'company_logo',
        'tags',
        'summary'
    ];
}
