<?php

namespace Modules\ReservationManagement\Controllers;

use Modules\ReservationManagement\Models as ReservationManagement;
use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\BaseController;

class Facility extends BaseController
{
    function __construct(){
        $this->facilitiesModel = new ReservationManagement\FacilitiesModel();
        $this->facilityStatusModel = new SystemSettings\FacilityStatusModel();
        helper(['form']);
    }

    public function index()
    {
        $data = [
            'page_title' => 'RFEIS | Facilities',
            'title' => 'Facilities',
            'view' => 'Modules\ReservationManagement\Views\facility\index',
            'facility' => $this->facilitiesModel->getDetails()
        ];
        return view('templates/index', $data);
    }
    public function add()
    {
        $data = [
            'page_title' => 'RFEIS | Facilities',
            'title' => 'Facility',
            'view' => 'Modules\ReservationManagement\Views\facility\form',
            'edit' => false,
            'status' => $this->facilityStatusModel->get()
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('facilities')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $file = $this->request->getFile('image');
                if ($file->isValid() && !$file->hasMoved()) {
                $imageName = $file->getRandomName();
                $file->move('./assets/uploads/facility', $imageName);
                }

                $_POST['image'] = $imageName;

                $this->facilitiesModel->add($_POST);
                $this->session->setFlashdata('success', 'Facility Successfully Added');
                return redirect()->to('/facility');
            }
        }

        return view('templates/index', $data);
    }
    public function edit($id)
    {
        $data = [
            'page_title' => 'RFEIS | Facilities',
            'title' => 'Facility',
            'view' => 'Modules\ReservationManagement\Views\facility\form',
            'edit' => true,
            'id' => $id,
            'value' => $this->facilitiesModel->get(['id' => $id])[0],
            'status' => $this->facilityStatusModel->get()
        ];
        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('facilitiesEdit')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {

                $facility = $this->facilitiesModel->get(['id' => $id])[0];
                $currentImage = $facility['image'];
                $file = $this->request->getFile('image');

                if ($file->isValid() && !$file->hasMoved()) {

                    if(file_exists('./assets/uploads/facility/'.$currentImage)){
                        unlink('./assets/uploads/facility/'.$currentImage);
                    }

                    $imageName = $file->getRandomName();
                    $file->move('./assets/uploads', $imageName);
                } else {
                    $imageName = $currentImage;
                }

                $_POST['image'] = $imageName;

                $this->facilitiesModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Facility Successfully Updated');
                return redirect()->to('/facility');
            }
        }

        return view('templates/index', $data);
    }

    public function delete($id)
    {
        $facility = $this->facilitiesModel->get(['id' => $id])[0];
        if(file_exists('./assets/uploads/facility/'.$facility['image'])){
            unlink('./assets/uploads/facility/'.$facility['image']);
        }
        $this->facilitiesModel->softDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }
}
