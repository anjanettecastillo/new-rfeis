<?php

namespace Modules\UniversityManagement\Models;

use App\Models\BaseModel;

class FacultiesModel extends BaseModel
{
    protected $table = 'frbs_faculties';
    protected $allowedFields = [
        'extension_name_id',
        'department_id',
        'position_id',
        'employee_number',
        'first_name',
        'last_name',
        'middle_name',
        'email_address',
        'contact_number',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function getDetails($conditions = []){
            $this->select('frbs_faculties.*, frbs_faculty_departments.department, frbs_faculty_positions.position, frbs_extension_names.extension_name');
            $this->join('frbs_faculty_departments' ,'frbs_faculties.department_id = frbs_faculty_departments.id');
            $this->join('frbs_faculty_positions' ,'frbs_faculties.position_id = frbs_faculty_positions.id');
            $this->join('frbs_extension_names' ,'frbs_faculties.extension_name_id = frbs_extension_names.id');

            foreach($conditions as $field => $value){
                $this->where([$field => $value]);
            }

            return $this->findAll();
    }
    public function getFacultyData(){
        $this->select('count(id) as faculty');
        return $this->findAll();
    }
}
