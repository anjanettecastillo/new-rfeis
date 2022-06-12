<?php namespace Modules\UniversityManagement\Models;

use App\Models\BaseModel;

class OrganizationsModel extends BaseModel
{
    protected $table = 'frbs_organizations';
    protected $allowedFields = [
        'organization_type_id', 
        'organization_name', 
        'description', 
        'status', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

    public function getDetails($conditions = []){

        $this->select('frbs_organizations.*,frbs_organization_types.organization_type');
        $this->join('frbs_organization_types', 'frbs_organization_types.id = frbs_organizations.organization_type_id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }

        return $this->findAll();
    }
    public function getOrgData(){
        $this->select('count(id) as org');
        return $this->findAll();
    }
}
