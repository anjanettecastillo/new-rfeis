<?php

namespace Modules\UserManagement\Models;

use App\Models\BaseModel;

class UsersModel extends BaseModel
{
    protected $table = 'frbs_users';
    protected $allowedFields = [
        'role_id', 
        'first_name',
        'last_name',
        'email_address',
        'username', 
        'password', 
        'status', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data)
    {
        $data = $this->passwordHash($data);

        return $data;
    }

    protected function beforeUpdate(array $data)
    {
        $data = $this->passwordHash($data);
        return $data;
    }

    protected function passwordHash(array $data)
    {
        if (isset($data['data']['password']))
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);

        return $data;
    }

    public function getDetails($condition = [])
    {
        $this->select('frbs_users.*, frbs_roles.role_name');
        $this->join('frbs_roles', ' frbs_roles.id = frbs_users.role_id');
        
        foreach($condition as $field => $value){
            $this->where($field, $value);
        }

        return $this->findAll();  
    }
    public function getUserData(){
        $this->select('count(id) as user');
        return $this->findAll();
    }
}
