<?php

namespace Modules\SystemSettings\Controllers;

use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\BaseController;

class EquipmentStatus extends BaseController
{
    function  __construct(){
        $this->equipmentStatusModel = new SystemSettings\EquipmentStatusModel();
        helper(['form']);
    }

    public function index()
    {
        
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'RFEIS | Equipment Status',
            'title' => 'Equipment Status',
            'action' => 'Add Equipment Status',
            'view' => 'Modules\SystemSettings\Views\EquipmentStatus\index',
            'equipmentStatus' => $this->equipmentStatusModel->get()
        ];
        
        return view('templates/index', $data);
    }

    public function add()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'RFEIS | Equipment Status',
            'title' => 'Equipment Status',
            'action' => 'Add Equipment Status',
            'view' => 'Modules\SystemSettings\Views\EquipmentStatus\form',
            'edit' => false
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('equipmentStatus')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->equipmentStatusModel->add($_POST);
                $this->session->setFlashdata('success', 'Equipment Status Successfully Added');
                return redirect()->to('/equipment-status');
            }
        }

        return view('templates/index', $data);
    }

    public function edit($id)
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'RFEIS | EquipmentStatus',
            'title' => 'Equipment Status',
            'action' => 'Edit Equipment Status',
            'view' => 'Modules\SystemSettings\Views\EquipmentStatus\form',
            'edit' => true,
            'id' => $id,
            'value' => $this->equipmentStatusModel->get(['id' => $id])[0]
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('equipmentStatus')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->equipmentStatusModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Equipment Status Successfully Added');
                return redirect()->to('/equipment-status');
            }
        }

        return view('templates/index', $data);
    }
    
    public function delete($id)
    {
        $this->equipmentStatusModel->SoftDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }

}
