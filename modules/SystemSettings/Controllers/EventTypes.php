<?php

namespace Modules\SystemSettings\Controllers;

use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\BaseController;

class EventTypes extends BaseController
{
    function __construct(){
        $this->eventTypesModel = new SystemSettings\EventTypesModel();
        helper(['form']);
    }

    public function index()
    {    
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'RFEIS | Event Types',
            'title' => 'Event Types',
            'action' => 'Add Event Type',
            'view' => 'Modules\SystemSettings\Views\EventTypes\index',
            'eventTypes' => $this->eventTypesModel->get()
        ];
        
        return view('templates/index',$data);
    }

    public function add()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'RFEIS | Event Types',
            'title' => 'Event Types',
            'action' => 'Add Event Type',
            'view' => 'Modules\SystemSettings\Views\EventTypes\form',
            'edit' => false
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('eventTypes')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->eventTypesModel->add($_POST);
                $this->session->setFlashdata('success', 'Event Type Successfully Added');
                return redirect()->to('/eventtypes');
            }
        }

        return view('templates/index',$data);
    }

    public function edit($id)
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'RFEIS | Event Types',
            'title' => 'Event Types',
            'action' => 'Edit Event Type',
            'view' => 'Modules\SystemSettings\Views\EventTypes\form',
            'edit' => true,
            'id' => $id,
            'value' => $this->eventTypesModel->get(['id' => $id])[0]
        ];
        
        if($this->request->getMethod() == 'post'){
            if(!$this->validate('eventTypes')){
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->eventTypesModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Event Type Successfully Updated');
                return redirect()->to('/eventtypes');
            }
        }
        return view('templates/index',$data);
    }

    public function delete($id)
    {
        $this->eventTypesModel->softDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }

}
