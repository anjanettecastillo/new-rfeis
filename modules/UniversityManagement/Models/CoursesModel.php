<?php namespace Modules\UniversityManagement\Models;

use App\Models\BaseModel;

class CoursesModel extends BaseModel
{
    protected $table = 'frbs_courses';
    protected $allowedFields = [
        'course_name',
        'description', 
        'status', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

}
