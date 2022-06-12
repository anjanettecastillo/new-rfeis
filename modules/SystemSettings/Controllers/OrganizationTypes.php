<?php namespace Modules\SystemSettings\Controllers;

use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\BaseController;

class OrganizationTypes extends BaseController
{
    function __construct(){
        $this->organizationTypesModel = new SystemSettings\OrganizationTypesModel();
        helper(['form']);
    }

    public function index()
    {
        
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'RFEIS | Organization Types',
            'title' => 'Organization Types',
            'action' => 'Add Organization Type',
            'view' => 'Modules\SystemSettings\Views\OrganizationTypes\index',
            'organizationTypes' => $this->organizationTypesModel->get()
        ];
        
        return view('templates/index',$data);
    }

    public function add()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'RFEIS | Organization Types',
            'title' => 'Organization Types',
            'action' => 'Add Organization Type',
            'view' => 'Modules\SystemSettings\Views\OrganizationTypes\form',
            'edit' => false
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('organizationTypes')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->organizationTypesModel->add($_POST);
                $this->session->setFlashdata('success', 'Organization Type Successfully Added');
                return redirect()->to('/organizationtypes');
            }
        }

        return view('templates/index',$data);
    }

    public function edit($id)
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'RFEIS | Organization Types',
            'title' => 'Organization Types',
            'action' => 'Edit Organization Type',
            'view' => 'Modules\SystemSettings\Views\OrganizationTypes\form',
            'edit' => true,
            'id' => $id,
            'value' => $this->organizationTypesModel->get(['id' => $id])[0]
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('organizationTypes')) {
                // die('here');
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->organizationTypesModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Organization Type Successfully Updated');
                return redirect()->to('/organizationtypes');
            }
        }
        return view('templates/index',$data);
    }

    public function delete($id)
    {
        $this->organizationTypesModel->softDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }

}