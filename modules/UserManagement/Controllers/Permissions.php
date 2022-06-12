<?php namespace Modules\UserManagement\Controllers;

use Modules\UserManagement\Models as UserManagement;
use App\Controllers\BaseController;

class Permissions extends BaseController
{
    function __construct(){
        $this->permissionsModel = new UserManagement\PermissionsModel();
        $this->modulesModel = new UserManagement\ModulesModel();
        $this->permissionTypesModel = new UserManagement\PermissionTypesModel();
        helper(['form']);
    }

    public function index()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'FRBS | Permissions',
            'title' => 'Permissions',
            'action' => 'Add Permission',
            'view' => 'Modules\UserManagement\Views\Permissions\index',
            'permissions' => $this->permissionsModel->getDetails()
        ];
        
        return view('templates/index',$data);
    }

    public function add()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'FRBS | Permissions',
            'title' => 'Permissions',
            'action' => 'Add Permission',
            'view' => 'Modules\UserManagement\Views\Permissions\form',
            'edit' => false,
            'modules' => $this->modulesModel->get(),
            'permissionTypes' => $this->permissionTypesModel->get()
        ];

        if ($this->request->getMethod() == 'post') {
            // die(print_r($_POST));
            if (!$this->validate('permissions')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } 
            else {
                $this->permissionsModel->add($_POST);
                $this->session->setFlashdata('success', 'Permission Successfully Added.');
                return redirect()->to('/permissions');
            }
        }

        return view('templates/index',$data);
    }

    public function edit($id)
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'FRBS | Permissions',
            'title' => 'Permissions',
            'action' => 'Edit Permission',
            'view' => 'Modules\UserManagement\Views\Permissions\form',
            'edit' => true,
            'id' => $id,
            'modules' => $this->modulesModel->get(),
            'permissionTypes' => $this->permissionTypesModel->get(),
            'value'=> $this->permissionsModel->get(['id' => $id])[0]
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('permissions')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->permissionsModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Permission Successfully Updated.');
                return redirect()->to('/permissions');
            }
        }
        return view('templates/index',$data);
    }
    
    public function delete($id)
    {
        if($this->permissionsModel->softDelete($id)){
            $data =[
            'status' => 'Deleted Successfully',
            'status_text' => 'Event successfully deleted!',
            'status_icon' => 'success'
            ];
        } else{
            $data =[
            'status' => 'Oops!',
            'status_text' => 'Something went wrong!',
            'status_icon' => 'warning'
            ];
        }
        return $this->response->setJSON($data);
    }
}
