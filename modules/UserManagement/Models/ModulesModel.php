<?php namespace Modules\UserManagement\Models;

use App\Models\BaseModel;

class ModulesModel extends BaseModel
{
    protected $table = 'frbs_modules';
    protected $allowedFields = [
        'module', 
        'description',
        'status', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

}
