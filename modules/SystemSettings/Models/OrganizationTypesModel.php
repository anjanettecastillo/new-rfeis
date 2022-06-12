<?php namespace Modules\SystemSettings\Models;

use App\Models\BaseModel;

class OrganizationTypesModel extends BaseModel
{
    protected $table = 'frbs_organization_types';
    protected $allowedFields = [
        'organization_type', 
        'description',
        'status', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

}
