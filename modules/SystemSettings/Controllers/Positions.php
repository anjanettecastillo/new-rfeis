<?php namespace Modules\SystemSettings\Controllers;

use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\BaseController;

class Positions extends BaseController
{
    function __construct(){
        $this->positionsModel = new SystemSettings\PositionsModel();
        helper(['form']);
    }

    public function index()
    {
        
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'RFEIS | Positions',
            'title' => 'Positions',
            'action' => 'Add Position',
            'view' => 'Modules\SystemSettings\Views\Positions\index',
            'positions' => $this->positionsModel->get()
        ];
        
        return view('templates/index',$data);
    }

    public function add()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'RFEIS | Positions',
            'title' => 'Positions',
            'action' => 'Add Position',
            'view' => 'Modules\SystemSettings\Views\Positions\form',
            'edit' => false
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('positions')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->positionsModel->add($_POST);
                $this->session->setFlashdata('success', 'Position Successfully Added');
                return redirect()->to('/positions');
            }
        }

        return view('templates/index',$data);
    }

    public function edit($id)
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url());
        $data = [
            'page_title' => 'RFEIS | Positions',
            'title' => 'Positions',
            'action' => 'Edit Position',
            'view' => 'Modules\SystemSettings\Views\Positions\form',
            'edit' => true,
            'id' => $id,
            'value' => $this->positionsModel->get(['id' => $id])[0]
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('positions')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->positionsModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Position Successfully Updated');
                return redirect()->to('/positions');
            }
        }

        return view('templates/index',$data);
    }

    public function delete($id)
    {
        $this->positionsModel->softDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }
}
