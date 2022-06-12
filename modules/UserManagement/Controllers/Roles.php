<?php namespace Modules\UserManagement\Controllers;

use Modules\UserManagement\Models as UserManagement;
use App\Controllers\BaseController;

class Roles extends BaseController
{
    function __construct(){
        $this->rolesModel = new UserManagement\RolesModel();
        helper(['form']);
    }
    public function index()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'RFEIS | Roles',
            'title' => 'Roles',
            'action' => 'Add Role',
            'view' => 'Modules\UserManagement\Views\Roles\index',
            'roles' => $this->rolesModel->get()
        ];

        return view('templates/index',$data);
    }

    public function add()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'RFEIS | Roles',
            'title' => 'Roles',
            'action' => 'Add Role',
            'view' => 'Modules\UserManagement\Views\Roles\form',
            'edit' => false
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('roles')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->rolesModel->add($_POST);
                $this->session->setFlashdata('success', 'Role Successfully Added.');
                return redirect()->to('/roles');
            }
        }

        return view('templates/index',$data);
    }

    public function edit($id)
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'RFEIS | Roles',
            'title' => 'Roles',
            'action' => 'Edit Role',
            'view' => 'Modules\UserManagement\Views\Roles\form',
            'edit' => true,
            'id' => $id,
            'value' => $this->rolesModel->get(['id' => $id])[0]
        ];
        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('roles')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->rolesModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Role Successfully Updated.');
                return redirect()->to('/roles');
            }
        }
        return view('templates/index',$data);
    }

    public function delete($id)
    {
        $this->rolesModel->softDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }
}
