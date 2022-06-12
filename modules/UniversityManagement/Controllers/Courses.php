<?php

namespace Modules\UniversityManagement\Controllers;

use Modules\UniversityManagement\Models as UniversityManagement;
use App\Controllers\BaseController;

class Courses extends BaseController
{
    function __construct(){
        $this->coursesModel = new UniversityManagement\CoursesModel();
        helper(['form']);
    }
    public function index()
    {
        $data = [
            'page_title' => 'RFEIS | Courses',
            'title' => 'Courses',
            'action' => 'Add Course',
            'view' => 'Modules\UniversityManagement\Views\Courses\index',
            'courses' => $this->coursesModel->get()
        ];
        return view('templates/index', $data);
    }
    public function add()
    {
        $data = [
            'page_title' => 'RFEIS | Courses',
            'title' => 'Course',
            'action' => 'Add Course',
            'view' => 'Modules\UniversityManagement\Views\Courses\form',
            'edit' => false
        ];
        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('courses')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->coursesModel->add($_POST);
                $this->session->setFlashdata('success', 'Course Successfully Added.');
                return redirect()->to('/courses');
            }
        }

        return view('templates/index', $data);
    }
    public function edit($id)
    {
        $data = [
            'page_title' => 'RFEIS | Courses',
            'title' => 'Course',
            'action' => 'Edit Course',
            'view' => 'Modules\UniversityManagement\Views\Courses\form',
            'edit' => true,
            'id' => $id,
            'value' => $this->coursesModel->get(['id' => $id])[0]
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('courses')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->coursesModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Course Successfully Updated.');
                return redirect()->to('/courses');
            }
        }

        return view('templates/index', $data);
    }

    public function delete($id)
    {
        $this->coursesModel->softDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }
    //--------------------------------------------------------------------
}
