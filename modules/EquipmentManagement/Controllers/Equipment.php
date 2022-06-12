<?php

namespace Modules\EquipmentManagement\Controllers;

use Modules\EquipmentManagement\Models as EquipmentManagement;
use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\BaseController;

class Equipment extends BaseController
{
    function __construct(){
        $this->equipmentsModel = new EquipmentManagement\EquipmentsModel();
        $this->equipmentStatusModel = new SystemSettings\EquipmentStatusModel();
        $this->equipmentCondtionsModel = new SystemSettings\EquipmentConditionsModel();
        helper(['form']);
    }

    public function index()
    {
        $data = [
            'page_title' => 'RFEIS | Equipments',
            'title' => 'Equipments',
            'view' => 'Modules\EquipmentManagement\Views\Equipment\index',
            'equipments' => $this->equipmentsModel->getDetails()
        ];
        return view('templates/index', $data);
    }
    public function add()
    {
        $data = [
            'page_title' => 'RFEIS | Equipments',
            'title' => 'Add equipments',
            'view' => 'Modules\EquipmentManagement\Views\Equipment\form',
            'edit' => false,
            'status' => $this->equipmentStatusModel->get(),
            'conditions' => $this->equipmentCondtionsModel->get() 
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('equipments')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $file = $this->request->getFile('image');
                if ($file->isValid() && !$file->hasMoved()) {
                $imageName = $file->getRandomName();
                $file->move('./assets/uploads/equipment', $imageName);
                }

                $_POST['image'] = $imageName;

                $this->equipmentsModel->add($_POST);
                $this->session->setFlashdata('success', 'Equipment Successfully Added');
                return redirect()->to('/equipments');
            }
        }

        return view('templates/index', $data);
    }
    public function edit($id)
    {
        $data = [
            'page_title' => 'RFEIS | Equipments',
            'title' => 'Edit equipments',
            'view' => 'Modules\EquipmentManagement\Views\Equipment\form',
            'edit' => true,
            'id' => $id,
            'value' => $this->equipmentsModel->get(['id' => $id])[0],
            'status' => $this->equipmentStatusModel->get(),
            'conditions' => $this->equipmentCondtionsModel->get() 
        ];
        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('equipmentsEdit')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {

                $equipments = $this->equipmentsModel->get(['id' => $id])[0];
                $currentImage = $equipments['image'];
                $file = $this->request->getFile('image');

                if ($file->isValid() && !$file->hasMoved()) {

                    if(file_exists('./assets/uploads/equipment/'.$currentImage)){
                        unlink('./assets/uploads/equipment/'.$currentImage);
                    }

                    $imageName = $file->getRandomName();
                    $file->move('./assets/uploads', $imageName);
                } else {
                    $imageName = $currentImage;
                }

                $_POST['image'] = $imageName;

                $this->equipmentsModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Equipment Successfully Updated');
                return redirect()->to('/equipments');
            }
        }

        return view('templates/index', $data);
    }

    public function delete($id)
    {
        $equipment = $this->equipmentsModel->get(['id' => $id])[0];
        if(file_exists('./assets/uploads/equipment/'.$equipment['image'])){
            unlink('./assets/uploads/equipment/'.$equipment['image']);
        }
        $this->equipmentsModel->softDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }
}
