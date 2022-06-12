<?php namespace Modules\UniversityManagement\Controllers;

use Modules\UniversityManagement\Models as UniversityManagement;
use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\BaseController;

class Organizations extends BaseController
{
    function __construct(){
        $this->organizationsModel = new UniversityManagement\OrganizationsModel();
        $this->organizationTypesModel = new SystemSettings\OrganizationTypesModel();
        helper(['form']);
    }

    public function index()
    {
        $data = [
            'page_title' => 'RFEIS | Organizations',
            'title' => 'Organizations',
            'view' => 'Modules\UniversityManagement\Views\Organizations\index',
            'organization' => $this->organizationsModel->getDetails()
        ];

        return view('templates/index', $data);
    }

    public function add()
    {   
        $data = [
            'page_title' => 'RFEIS | Organizations',
            'title' => 'Organization',
            'view' => 'Modules\UniversityManagement\Views\Organizations\form',
            'type' => $this->organizationTypesModel->get(),
            'edit' => false
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('organizations')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->organizationsModel->add($_POST);
                $this->session->setFlashdata('success', 'Organization Successfully Added.');
                return redirect()->to('/organizations');
            }
        }

        return view('templates/index', $data);
    }

    public function edit($id)
    {
        $data = [
            'page_title' => 'RFEIS | Organizations',
            'title' => 'Organization',
            'view' => 'Modules\UniversityManagement\Views\Organizations\form',
            'type' => $this->organizationTypesModel->get(),
            'value' => $this->organizationsModel->get(['id' => $id])[0],
            'edit' => true,
            'id' => $id
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('organizations')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->organizationsModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Organization Successfully Updated.');
                return redirect()->to('/organizations');
            }
        }

        return view('templates/index', $data);
    }

    public function delete($id)
    {
        $this->organizationsModel->softDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }
    //--------------------------------------------------------------------
}
