<?php namespace Modules\UserManagement\Models;

use App\Models\BaseModel;

class PermissionTypesModel extends BaseModel
{
    protected $table = 'frbs_permission_types';
    protected $allowedFields = [
        'type',
        'slug',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
