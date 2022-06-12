<?php namespace App\Validation;

use Modules\UserManagement\Models\UsersModel;

class UserRules{
    
    public function validateUser(String $str, String $fields, array $data){
        $userModel = new UsersModel();
        $user = $userModel->where('username', $data['username'])
                      ->first();
        if(!$user)
            return false;
            
        return password_verify($data['password'], $user['password']);          
    }
}