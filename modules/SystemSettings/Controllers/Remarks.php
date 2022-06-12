<?php

namespace Modules\SystemSettings\Controllers;

use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\BaseController;

class Remarks extends BaseController
{
    function  __construct(){
        $this->remarksModel = new SystemSettings\RemarksModel();
        helper(['form']);
    }

    public function index()
    {
        
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'RFEIS | Remarks',
            'title' => 'Remarks',
            'action' => 'Add Remark',
            'view' => 'Modules\SystemSettings\Views\Remarks\index',
            'remarks' => $this->remarksModel->get()
        ];
        
        return view('templates/index', $data);
    }

    public function add()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'RFEIS | Remarks',
            'title' => 'Remarks',
            'action' => 'Add Remark',
            'view' => 'Modules\SystemSettings\Views\Remarks\form',
            'edit' => false
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('remarks')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->remarksModel->add($_POST);
                $this->session->setFlashdata('success', 'Remark Successfully Added');
                return redirect()->to('/remarks');
            }
        }

        return view('templates/index', $data);
    }

    public function edit($id)
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'RFEIS | Remarks',
            'title' => 'Remarks',
            'action' => 'Edit Remark',
            'view' => 'Modules\SystemSettings\Views\Remarks\form',
            'edit' => true,
            'id' => $id,
            'value' => $this->remarksModel->get(['id' => $id])[0]
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('remarks')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->remarksModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Remark Successfully Updated');
                return redirect()->to('/remarks');
            }
        }

        return view('templates/index', $data);
    }
    
    public function delete($id)
    {
        $this->remarksModel->SoftDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }

}
