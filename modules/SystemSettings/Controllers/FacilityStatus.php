<?php

namespace Modules\SystemSettings\Controllers;

use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\BaseController;

class FacilityStatus extends BaseController
{
    function  __construct(){
        $this->facilityStatusModel = new SystemSettings\FacilityStatusModel();
        helper(['form']);
    }

    public function index()
    {
        
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'RFEIS | FacilityStatus',
            'title' => 'Facility Status',
            'action' => 'Add Facility Status',
            'view' => 'Modules\SystemSettings\Views\FacilityStatus\index',
            'facilityStatus' => $this->facilityStatusModel->get()
        ];
        
        return view('templates/index', $data);
    }

    public function add()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'RFEIS | FacilityStatus',
            'title' => 'Facility Status',
            'action' => 'Add Facility Status',
            'view' => 'Modules\SystemSettings\Views\FacilityStatus\form',
            'edit' => false
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('facilityStatus')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->facilityStatusModel->add($_POST);
                $this->session->setFlashdata('success', 'Facility Status Successfully Added');
                return redirect()->to('/facility-status');
            }
        }

        return view('templates/index', $data);
    }

    public function edit($id)
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'RFEIS | FacilityStatus',
            'title' => 'Facility Status',
            'action' => 'Edit Facility Status',
            'view' => 'Modules\SystemSettings\Views\FacilityStatus\form',
            'edit' => true,
            'id' => $id,
            'value' => $this->facilityStatusModel->get(['id' => $id])[0]
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('facilityStatus')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->facilityStatusModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Facility Status Successfully Updated');
                return redirect()->to('/facility-status');
            }
        }

        return view('templates/index', $data);
    }
    
    public function delete($id)
    {
        $this->facilityStatusModel->SoftDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }

}
