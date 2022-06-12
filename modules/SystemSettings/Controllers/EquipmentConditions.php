<?php

namespace Modules\SystemSettings\Controllers;

use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\BaseController;

class EquipmentConditions extends BaseController
{
    function  __construct(){
        $this->equipmentConditionsModel = new SystemSettings\EquipmentConditionsModel();
        helper(['form']);
    }

    public function index()
    {
        
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'RFEIS | EquipmentConditions',
            'title' => 'Equipment Conditions',
            'action' => 'Add Equipment Conditions',
            'view' => 'Modules\SystemSettings\Views\EquipmentConditions\index',
            'equipmentConditions' => $this->equipmentConditionsModel->get()
        ];
        
        return view('templates/index', $data);
    }

    public function add()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'RFEIS | EquipmentConditions',
            'title' => 'Equipment Conditions',
            'action' => 'Add Equipment Conditions',
            'view' => 'Modules\SystemSettings\Views\EquipmentConditions\form',
            'edit' => false
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('equipmentConditions')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->equipmentConditionsModel->add($_POST);
                $this->session->setFlashdata('success', 'Equipment Condition Successfully Added');
                return redirect()->to('/equipment-conditions');
            }
        }

        return view('templates/index', $data);
    }

    public function edit($id)
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'RFEIS | EquipmentConditions',
            'title' => 'Equipment Conditions',
            'action' => 'Edit Equipment Conditions',
            'view' => 'Modules\SystemSettings\Views\EquipmentConditions\form',
            'edit' => true,
            'id' => $id,
            'value' => $this->equipmentConditionsModel->get(['id' => $id])[0]
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('equipmentConditions')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->equipmentConditionsModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Equipment Condition Successfully Updated');
                return redirect()->to('/equipment-conditions');
            }
        }

        return view('templates/index', $data);
    }
    
    public function delete($id)
    {
        $this->equipmentConditionsModel->SoftDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }

}
