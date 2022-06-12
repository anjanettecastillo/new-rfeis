<?php namespace App\Controllers;

use App\Models\DashboardDataModel;
use Modules\ReservationManagement\Models as ReservationManagement;
use Modules\UniversityManagement\Models as UniversityManagement;
use Modules\UserManagement\Models as UserManagement;
class Dashboard extends BaseController
{
	public function index()
	{
		$this->facilitiesModel = new ReservationManagement\FacilitiesModel();
		$this->reservationsModel = new ReservationManagement\ReservationsModel();
		$this->logsModel = new ReservationManagement\LogsModel();
		$this->studentsModel = new UniversityManagement\StudentsModel();
		$this->facultiesModel = new UniversityManagement\FacultiesModel();
		$this->organizationsModel = new UniversityManagement\OrganizationsModel();
		$this->usersModel = new UserManagement\UsersModel();
		$data = [
			'page_title' => 'RFEIS | Dashboard',
			'title' => 'Reservation of Facility and Equipment Inventory System',
			'facilities' => $this->facilitiesModel->get(),
			'facility' => $this->facilitiesModel->getFacilityData(),
			'faculty' => $this->facultiesModel->getFacultyData()[0],
			'student' => $this->studentsModel->getStudentData()[0],
			'users' => $this->usersModel->getUserData()[0],
			'activity' => $this->logsModel->getDetails(['frbs_logs.description !=' => 'signed in']),
			'signin' => $this->logsModel->getDetails(['frbs_logs.description' => 'signed in']),
			'orgs' => $this->organizationsModel->getOrgData()[0],
		];
		// die(print_r($data['student']));
		for($ctr = 1; $ctr <= 12; $ctr++){
			$str='reservations'.$ctr;
			$data[$str] = $this->reservationsModel->getReservationData($ctr);
		}
		return view('Admin/dashboard', $data);
	}
	//--------------------------------------------------------------------
}
