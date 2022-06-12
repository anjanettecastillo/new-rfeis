<?php namespace Modules\SystemSettings\Models;

use App\Models\BaseModel;

class LevelsModel extends BaseModel
{
    protected $table = 'frbs_year_levels';
    protected $allowedFields = [
        'year', 
        'description',
        'status', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];
}
