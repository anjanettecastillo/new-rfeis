<?php namespace Modules\SystemSettings\Models;

use App\Models\BaseModel;

class DepartmentsModel extends BaseModel
{
    protected $table = 'frbs_faculty_departments';
    protected $allowedFields = [
        'department', 
        'description',
        'status', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];


}
