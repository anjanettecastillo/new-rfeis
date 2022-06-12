<?php namespace Modules\UserManagement\Models;

use App\Models\BaseModel;

class PermissionsModel extends BaseModel
{
    protected $table = 'frbs_permissions';
    protected $allowedFields = [
        'module_id',
        'permission',
        'permission_type',
        'slug',
        'icon',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function getDetails($conditions = [])
    {
        $this->select('frbs_permissions.*, m.module, t.type');
        $this->join('frbs_modules as m', 'm.id = frbs_permissions.module_id');
        $this->join('frbs_permission_types as t', 't.id = frbs_permissions.permission_type');
        
        foreach($conditions as $field => $value){
            $this->where($field, $value);
        }

        return $this->findAll();
    }

}
