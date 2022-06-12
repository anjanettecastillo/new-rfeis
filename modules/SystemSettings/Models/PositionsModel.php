<?php namespace Modules\SystemSettings\Models;

use App\Models\BaseModel;

class PositionsModel extends BaseModel
{
    protected $table = 'frbs_faculty_positions';
    protected $allowedFields = [
        'position', 
        'description',
        'status', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

}
