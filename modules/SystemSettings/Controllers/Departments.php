<?php namespace Modules\SystemSettings\Controllers;

use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\BaseController;

class Departments extends BaseController
{
    function __construct(){
        $this->departmentsModel = new SystemSettings\DepartmentsModel();
        helper(['form']);
    }

    public function index()
    {
        
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'RFEIS | Departments',
            'title' => 'Departments',
            'action' => 'Add Department',
            'view' => 'Modules\SystemSettings\Views\Departments\index',
            'departments' => $this->departmentsModel->get()
        ];
        
        return view('templates/index',$data);
    }

    public function add()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'RFEIS | Departments',
            'title' => 'Departments',
            'action' => 'Add Department',
            'view' => 'Modules\SystemSettings\Views\Departments\form',
            'edit' => false
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('departments')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->departmentsModel->add($_POST);
                $this->session->setFlashdata('success', 'Department Successfully Added');
                return redirect()->to('/departments');
            }
        }

        return view('templates/index',$data);
    }

    public function edit($id)
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'RFEIS | Departments',
            'title' => 'Departments',
            'action' => 'Edit Department',
            'view' => 'Modules\SystemSettings\Views\Departments\form',
            'edit' => true,
            'id' => $id,
            'value' => $this->departmentsModel->get(['id' => $id])[0]
        ];
        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('departments')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->departmentsModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Department Successfully Updated');
                return redirect()->to('/departments');
            }
        }

        return view('templates/index',$data);
    }

    public function delete($id)
    {
        $this->departmentsModel->softDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }
}
