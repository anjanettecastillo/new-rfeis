<?php namespace Modules\UserManagement\Controllers;

use Modules\UserManagement\Models as UserManagement;
use App\Controllers\BaseController;

class Users extends BaseController
{
    function __construct(){
        $this->usersModel = new UserManagement\UsersModel();
        $this->rolesModel = new UserManagement\RolesModel();
        helper(['form']);
    }
    
    public function index()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'RFIES | Users',
            'title' => 'Users',
            'view' => 'Modules\UserManagement\Views\Users\index',
            'users' => $this->usersModel->getDetails()
        ];
        
        return view('templates/index',$data);
    }

    public function add()
    {
        $data = [
            'page_title' => 'RFIES | Users',
            'title' => 'Users',
            'action' => 'Add User',
            'view' => 'Modules\UserManagement\Views\Users\form',
            'edit' => false,
            'roles' => $this->rolesModel->get(),
        ];

        
        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('users')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->usersModel->add($_POST);
                $this->session->setFlashdata('success', 'User successfully added!');
                return redirect()->to('/users');
            }
        }

        return view('templates/index',$data);
    }

    public function edit($id)
    {
        $data = [
            'page_title' => 'RFIES | Users',
            'title' => 'User',
            'action' => 'Edit User',
            'view' => 'Modules\UserManagement\Views\Users\form',
            'edit' => true,
            'id' => $id,
            'roles' => $this->rolesModel->get(),
            'value' => $this->usersModel->get(['id' => $id])[0]
        ];

        if(empty($data['value'])){
            die('Some Error Code Here (No Record)');
        }

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('users')) {
                $data['value'] = $_POST;
                $data['errors'] = $this->validation->getErrors();
            } else {
                $this->usersModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Record Succesfully Updated');
                return redirect()->to('/users');
            }
        }
        return view('templates/index', $data);
    }

    public function delete($id)
    {
        $this->usersModel->softDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }

    public function view($id)
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'RFIES | Users',
            'title' => 'Users',
            'action' => 'View User',
            'users' => $usersModel->getUser($id)->getRow()
        ];
        echo view('Modules\UserManagement\Views\Users\viewUser', $data);
    }
}
