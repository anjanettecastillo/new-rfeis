<?php namespace Modules\SystemSettings\Controllers;

use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\BaseController;

class Levels extends BaseController
{
    function __construct(){
        $this->levelsModel = new SystemSettings\LevelsModel();
        helper(['form']);
    }

    public function index()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        
        $data = [
            'page_title' => 'RFEIS | Year Levels',
            'title' => 'Year Levels',
            'levels' => $this->levelsModel->get(),
            'view' => 'Modules\SystemSettings\Views\Levels\index'
        ];
        
        return view('templates/index',$data);
    }

    public function add()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'RFEIS | Year Levels',
            'title' => 'Year Level',
            'action' => 'Add Year Level',
            'view' => 'Modules\SystemSettings\Views\Levels\form',
            'edit' => false
        ];

        
        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('levels')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->levelsModel->add($_POST);
                $this->session->setFlashdata('success', 'Year Level Successfully Added.');
                return redirect()->to('/levels');
            }
        }

        return view('templates/index',$data);
    }

    public function edit($id)
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'RFEIS | Year Levels',
            'title' => 'Year Level',
            'action' => 'Edit Year Level',
            'view' => 'Modules\SystemSettings\Views\Levels\form',
            'edit' => true,
            'id' => $id,
            'value' => $this->levelsModel->get(['id' => $id])[0]
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('levels')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->levelsModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Year Level Successfully Updated.');
                return redirect()->to('/levels');
            }
        }

        return view('templates/index',$data);
    }

    public function delete($id)
    {
        $this->levelsModel->softDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }
}
