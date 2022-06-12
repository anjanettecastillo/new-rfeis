<?php

namespace Modules\UniversityManagement\Controllers;

use Modules\UniversityManagement\Models as UniversityManagement;
use Modules\UserManagement\Models as UserManagement;
use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\BaseController;

class Officers extends BaseController
{
    function __construct(){
        $this->officersModel = new UniversityManagement\OfficersModel();
        $this->organizationsModel = new UniversityManagement\OrganizationsModel();
        $this->coursesModel = new UniversityManagement\CoursesModel();
        $this->usersModel = new UserManagement\UsersModel();
        $this->levelsModel = new SystemSettings\LevelsModel();
        $this->extensionsModel = new SystemSettings\ExtensionsModel();
        helper(['form']);
    }

    public function index()
    {
        $data = [
            'page_title' => 'RFEIS | Officers',
            'title' => 'Officers',
            'view' => 'Modules\UniversityManagement\Views\Officers\index',
            'officers' => $this->officersModel->getDetails()
        ];
        return view('templates/index', $data);
    }
    public function add()
    {
        $data = [
            'page_title' => 'RFEIS | Officers',
            'title' => 'officers',
            'view' => 'Modules\UniversityManagement\Views\Officers\form',
            'edit' => false,
            'courses' => $this->coursesModel->get(),
            'organizations' => $this->organizationsModel->get(),
            'levels' => $this->levelsModel->get(),
            'extensions' => $this->extensionsModel->get(),
        ];
        if ($this->request->getMethod() == 'post') {
            
            if (!$this->validate('officers')) {
                
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                //die('here');
                $newAccount = [
                    'last_name' => strtolower($this->request->getVar('last_name')),
                    'first_name' => strtolower($this->request->getVar('first_name')),
                    'username' => strtolower($this->request->getVar('student_number')),
                    'email_address' => strtolower($this->request->getVar('email_address')),
                    'password' => strtolower($this->request->getVar('student_number')),
                    'role_id' => 3,
                    'status' => 'a'
                ];
                $this->officersModel->add($_POST);
                $this->usersModel->add($newAccount);
                $this->session->setFlashdata('success', 'Officer Successfully Added.');
                return redirect()->to('/officers');
            }
        }

        return view('templates/index', $data);
    }
    public function edit($id)
    {
        $data = [
            'page_title' => 'RFEIS | Officers',
            'title' => 'officer',
            'view' => 'Modules\UniversityManagement\Views\Officers\form',
            'edit' => true,
            'id' => $id,
            'courses' => $this->coursesModel->get(),
            'organizations' => $this->organizationsModel->get(),
            'levels' => $this->levelsModel->get(),
            'extensions' => $this->extensionsModel->get(),
            'value' => $this->officersModel->get(['id' => $id])[0]
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('officers')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->officersModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Officer successfully updated.');
                return redirect()->to('/officers');
            }
        }

        return view('templates/index', $data);
    }

    public function delete($id)
    {
        $officer = $this->officersModel->get(['id' => $id])[0];
        $officerUser = $this->usersModel->get(['username' => $officer['student_number']])[0];
        
        if($this->officersModel->softDelete($id)){
            $this->usersModel->softDelete($officerUser['id']);
            $data =[
                'status'=> 'Deleted Successfully',
                'status_text' => 'Record Successfully Deleted',
                'status_icon' => 'success'
            ];
            return $this->response->setJSON($data);
        }
        
    }

    //public function view($id){
       // $data = [
           // 'page_title' => 'RFEIS | Officers',
            //'title' => 'Officer',
            //'view' => 'Modules\UniversityManagement\Views\Officers\profile',
            //'id' => $id,
          //  'officers' => $this->officersModel->getDetails(['frbs_officers.id' => $id])
      //  ];

        //return view('templates/index', $data);
    //}
   // File upload and Insert records
    public function import(){
    // Validation
        $input = $this->validate([
            'uploadFile' => [
                'rules' => 'uploaded[uploadFile]|max_size[uploadFile,3072]|ext_in[uploadFile,csv]',
                'label' => 'File'
            ]
        ]);
        if (!$input) { // Not valid
            $data = [
                'page_title' => 'RFEIS | Officers',
                'title' => 'List of Officers',
                'view' => 'Modules\UniversityManagement\Views\Officers\index',
                'officers' => $this->officersModel->getDetails(),
                'errors' => $this->validation->getErrors(),
            ];
            return view('templates/index', $data);
        }else{ // Valid
            if($file = $this->request->getFile('uploadFile')) {
                if ($file->isValid() && ! $file->hasMoved()) {
                    // Get random file name
                    $newName = $file->getRandomName();
                    // Store file in public/csvfile/ folder
                    $file->move('../public/csvfile', $newName);
                    // Reading file
                    $file = fopen("../public/csvfile/".$newName,"r");
                    $i = 0;
                    $numberOfFields = 11; // Total number of fields
                    $csvData = array();
                    // Initialize $csvData Array
                    while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                        $num = count($filedata);
                        // Skip first row & check number of fields
                        if($i > 0 && $num == $numberOfFields){ 
                            // Key names are the insert table field names - name, email, city, and status
                            //$csvData[$i]['organization_id'] = $filedata[0];
                            //$csvData[$i]['course_id'] = $filedata[1];
                            //$csvData[$i]['year_id'] = $filedata[2];
                            $csvData[$i]['extension_name_id'] = $filedata[3];
                            $csvData[$i]['student_number'] = $filedata[4];
                            $csvData[$i]['first_name'] = $filedata[5];
                            $csvData[$i]['last_name'] = $filedata[6];
                            $csvData[$i]['middle_name'] = $filedata[7];
                            $csvData[$i]['position'] = $filedata[7];
                            //$csvData[$i]['email_address'] = $filedata[8];
                            //$csvData[$i]['contact_number'] = $filedata[9];
                           // $csvData[$i]['facebook_account'] = $filedata[10];
                        }
                        $i++;
                    }
                    fclose($file);
                    // Insert data
                    $count = 0;
                    foreach($csvData as $userdata){
                        // Check record
                        $checkrecord = $this->officersModel->where('student_number',$userdata['student_number'])->countAllResults();
                        if($checkrecord == 0){
                            ## Insert Record
                            if($this->officersModel->add($userdata)){

                                $newAccount = [
                                    'last_name' => strtolower($userdata['last_name']),
                                    'first_name' => strtolower($userdata['first_name']),
                                    'username' => strtolower($userdata['student_number']),
                                    'email_address' => strtolower($userdata['email_address']),
                                    'password' => strtolower($userdata['student_number']),
                                    'role_id' => 3,
                                    'status' => 'a'
                                ];
                                $this->usersModel->add($newAccount);
                                $count++;
                            }
                        }
                    }
                    // Set Session
                    session()->setFlashdata('success', $count.' Record inserted successfully!');
                    session()->setFlashdata('alert-class', 'alert-success');
                    if(file_exists('../public/csvfile/'.$newName)){
                        unlink('../public/csvfile/'.$newName);
                    }
                }else{
                    // Set Session
                    session()->setFlashdata('error', 'File not imported.');
                    session()->setFlashdata('alert-class', 'alert-danger');

                }
            }else{
                // Set Session
                session()->setFlashdata('error', 'File not imported.');
                session()->setFlashdata('alert-class', 'alert-danger');

            }
        }
        return redirect()->to('/officers'); 
    }
    //--------------------------------------------------------------------
}
