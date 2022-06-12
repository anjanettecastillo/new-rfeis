<?php namespace App\Controllers;

use Modules\UserManagement\Models\UsersModel;
use Modules\UserManagement\Models as UserManagement;
use Modules\ReservationManagement\Models as ReservationManagement;

class Security extends BaseController{

    function __construct(){
        $this->rolesPermissionsModel = new UserManagement\RolesPermissionsModel();
        $this->logsModel = new ReservationManagement\LogsModel();
    }

    public function index(){
        $data = [
            'page_title' => 'RFEIS | Sign in',
            'title' => 'Reservation of Facility and Equipment Inventory System'
        ];
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            //validation
            $rules = [
                'username' => 'required|min_length[5]|max_length[25]',
                'password' => 'required|min_length[8]|max_length[50]|validateUser[username,password]',
            ];
            $errors = [
                'password' => [
                    'validateUser' => 'Username or Password don\'t match.'
                ]
            ];

            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new UsersModel();

                $user = $model->where('username', $this->request->getVar('username'))
                              ->first();

                $this->setUserMethod($user);
                $this->session->setFlashdata('success_login', 'Successfully logged in!');
                $logData = [
                    'user_id' => session()->get('id'),
                    'description' => 'signed in'
                ];
                $this->logsModel->add($logData);
                if(session()->get('role_id') <= 2){
                    return redirect()->to('/dashboard');
                }else{
                    return redirect()->to('/reservations/t');
                }

            }
        }

        return view('Login/login', $data);
    }

    private function setUserMethod($user){
        $data = [
            'id' => $user['id'],
            'role_id' => $user['role_id'],
            'first_name' => $user['first_name'],
            'email_address' => $user['email_address'],
            'isLoggedIn' => true,
            'permissions' => $this->rolesPermissionsModel->getPermissions(['role_id' => $user['role_id']]),
            'modules' => $this->rolesPermissionsModel->getModules(['role_id' => $user['role_id']]),
        ];

        session()->set($data);

        return true;
    }

    public function register(){
        $data = [
            'page_title' => 'FRBS | Register',
            'title' => 'Facility Reservation and Billing System'
        ];
        helper(['form']);

        if($this->request->getMethod() == 'post'){
            //validation
            $rules=[
                'username' => 'required|min_length[5]|max_length[25]|is_unique[ors_users.username]',
                'password' => 'required|min_length[8]|max_length[50]',
                'confirm_password' => 'matches[password]',
            ];

            if(! $this->validate($rules)){
                $data['validation'] = $this->validator;
            }
            else{
                $model = new UsersModel();

                $newData = [
                    'username' => $this->request->getVar('username'),
                    'password' => $this->request->getVar('password'),
                    'role_id' => 4,
                    'status' => 'a'
                ];

                $model->save($newData);
                $session = session();
                $session->setFlashdata('success','Successfull Registration');
                return redirect()->to('/');
            }

        }

        return view('register',$data);
    }
    public function signOut(){
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}