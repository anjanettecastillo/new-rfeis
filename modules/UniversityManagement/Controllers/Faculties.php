<?php namespace Modules\UniversityManagement\Controllers;

use Modules\UniversityManagement\Models as UniversityManagement;
use Modules\UserManagement\Models as UserManagement;
use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\BaseController;

class Faculties extends BaseController
{

    function __construct(){
        $this->facultiesModel = new UniversityManagement\FacultiesModel();
        $this->usersModel = new UserManagement\UsersModel();
        $this->extensionsModel = new SystemSettings\ExtensionsModel();
        $this->positionsModel = new SystemSettings\PositionsModel();
        $this->departmentsModel = new SystemSettings\DepartmentsModel();
        helper(['form']);
    }

    public function index()
    {
        $data = [
            'page_title' => 'RFEIS | Faculties',
            'title' => 'Faculties',
            'view' => 'Modules\UniversityManagement\Views\Faculties\index',
            'faculties' => $this->facultiesModel->getDetails()
        ];
        return view('templates/index', $data);
    }
    public function add()
    {
        $data = [
            'page_title' => 'RFEIS | Faculties',
            'title' => 'Faculty',
            'view' => 'Modules\UniversityManagement\Views\Faculties\form',
            'edit' => false,
            'extensions' => $this->extensionsModel->get(),
            'positions' => $this->positionsModel->get(),
            'departments' => $this->departmentsModel->get(),
        ];
        
        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('faculties')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $newAccount = [
                    'last_name' => strtolower($this->request->getVar('last_name')),
                    'first_name' => strtolower($this->request->getVar('first_name')),
                    'email_address' => strtolower($this->request->getVar('email_address')),
                    'username' => strtolower($this->request->getVar('employee_number')),
                    'password' => strtolower($this->request->getVar('employee_number')),
                    'role_id'=> 4,
                ];

                $this->facultiesModel->add($_POST);
                $this->usersModel->add($newAccount);
                $this->session->setFlashdata('success', 'Faculty Successfully Added.');
                return redirect()->to('/faculties');
            }
        }

        return view('templates/index', $data);
    }
    public function edit($id)
    {
        $data = [
            'page_title' => 'RFEIS | Faculties',
            'title' => 'Faculty',
            'view' => 'Modules\UniversityManagement\Views\Faculties\form',
            'edit' => true,
            'id' => $id,
            'extensions' => $this->extensionsModel->get(),
            'positions' => $this->positionsModel->get(),
            'departments' => $this->departmentsModel->get(),
            'value' => $this->facultiesModel->get(['id' => $id])[0]
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('faculties')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->facultiesModel->update($id,$_POST);
                $this->session->setFlashdata('success', 'Faculty Successfully Updated.');
                return redirect()->to('/faculties');
            }
        }

        return view('templates/index', $data);
    }
    public function delete($id)
    {
        $faculty = $this->facultiesModel->get(['id' => $id])[0];
        $facultyUser = $this->usersModel->get(['username' => $faculty['employee_number']])[0];
        
       
        if( $this->facultiesModel->softDelete($id)){
            $this->usersModel->softDelete($facultyUser['id']);
            $data =[
                'status'=> 'Deleted Successfully',
                'status_text' => 'Record Successfully Deleted',
                'status_icon' => 'success'
            ];
            return $this->response->setJSON($data);
        }
    }

    public function view($id){
        $data = [
            'page_title' => 'RFEIS | Faculties',
            'title' => 'Faculty',
            'id' => $id,
            'view' => 'Modules\UniversityManagement\Views\Faculties\profile',
            'faculty' => $this->facultiesModel->getDetails(['frbs_faculties.id' => $id])[0]
        ];

        return view('templates/index', $data);
    }
   // File upload and Insert records
    public function import(){
    // Validation
        $input = $this->validate([
            'uploadFile' => [
                'rules' => 'uploaded[uploadFile]|max_size[uploadFile,1024]|ext_in[uploadFile,csv]',
                'label' => 'File'
            ]
        ]);
        if (!$input) { // Not valid
            $data = [
                'page_title' => 'RFEIS | Faculties',
                'title' => 'List of Faculties',
                'view' => 'Modules\UniversityManagement\Views\Faculties\index',
                'faculties' => $this->facultiesModel->getDetails(),
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
                    $numberOfFields = 9; // Total number of fields
                    $csvData = array();
                    // Initialize $csvData Array
                    while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                        $num = count($filedata);
                        // Skip first row & check number of fields
                        if($i > 0 && $num == $numberOfFields){ 
                            // Key names are the insert table field names - name, email, city, and status
                            $csvData[$i]['position_id'] = $filedata[0];
                            $csvData[$i]['department_id'] = $filedata[1];
                            $csvData[$i]['extension_name_id'] = $filedata[2];
                            $csvData[$i]['employee_number'] = $filedata[3];
                            $csvData[$i]['first_name'] = $filedata[4];
                            $csvData[$i]['last_name'] = $filedata[5];
                            $csvData[$i]['middle_name'] = $filedata[6];
                            $csvData[$i]['email_address'] = $filedata[7];
                            $csvData[$i]['contact_number'] = $filedata[8];
                        }
                        $i++;
                    }
                    fclose($file);
                    // Insert data
                    $count = 0;
                    foreach($csvData as $userdata){
                        // Check record
                        $checkrecord = $this->facultiesModel->where('employee_number',$userdata['employee_number'])->countAllResults();
                        if($checkrecord == 0){
                            ## Insert Record
                            if($this->facultiesModel->add($userdata)){
                                $newAccount = [
                                    'last_name' => strtolower($userdata['last_name']),
                                    'first_name' => strtolower($userdata['first_name']),
                                    'username' => strtolower($userdata['employee_number']),
                                    'email_address' => strtolower($userdata['email_address']),
                                    'password' => strtolower($userdata['employee_number']),
                                    'role_id' => 4,
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
        return redirect()->to('/faculties'); 
    }
    //--------------------------------------------------------------------
}
