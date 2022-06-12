<?php namespace Modules\UniversityManagement\Models;

use App\Models\BaseModel;

class StudentsModel extends BaseModel
{
    protected $table = 'frbs_students';
    protected $allowedFields = [
        'course_id',
        'organization_id',
        'year_id',
        'extension_name_id',
        'student_number',
        'first_name',
        'last_name',
        'middle_name',
        'email_address',
        'contact_number',
        'facebook_account',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function getDetails($conditions = []){
            $this->select('frbs_students.*, frbs_organizations.organization_name, frbs_courses.course_name, frbs_year_levels.year, frbs_extension_names.extension_name');
            $this->join('frbs_organizations' ,'frbs_students.organization_id = frbs_organizations.id');
            $this->join('frbs_courses' ,'frbs_students.course_id = frbs_courses.id');
            $this->join('frbs_year_levels' ,'frbs_students.year_id = frbs_year_levels.id');
            $this->join('frbs_extension_names' ,'frbs_students.extension_name_id = frbs_extension_names.id');

            foreach($conditions as $field => $value){
                $this->where([$field => $value]);
            }

            return $this->findAll();
    }
    public function getStudentData(){
        $this->select('count(id) as students');
        return $this->findAll();
    }

}
