<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course_topics extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_ar',
        'title_fr',
        'is_free',
        'course_id',
        'order'
    ];
}
