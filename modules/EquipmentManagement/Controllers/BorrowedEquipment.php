<?php namespace Modules\EquipmentManagement\Controllers;

use Modules\EquipmentManagement\Models as EquipmentManagement;
use Modules\ReservationManagement\Models as ReservationManagement;
use Modules\SystemSettings\Models as SystemSettings;
use App\Controllers\BaseController;

class BorrowedEquipment extends BaseController
{
	function __construct(){
		$this->borrowedEquipmentsModel = new EquipmentManagement\BorrowedEquipmentsModel();
		$this->equipmentsModel = new EquipmentManagement\EquipmentsModel();
		$this->reservationsModel = new ReservationManagement\ReservationsModel();
		$this->equipmentStatusModel = new SystemSettings\EquipmentStatusModel();
		helper(['form']);
	}

	public function index()
	{
		$data = [
			'page_title' => 'RFEIS | Borrowed Equipments',
			'title' => 'Borrowed Equipments',
			'view' => 'Modules\EquipmentManagement\Views\borrowedEquipment\index',
			'borrowedEquipments' => $this->borrowedEquipmentsModel->getDetails(),
		];

		return view('templates/index', $data);
	}

	public function add()
	{
		$data = [
			'page_title' => 'RFEIS | BorrowedEquipments',
			'title' => 'Equipment',
			'view' => 'Modules\EquipmentManagement\Views\borrowedEquipment\form',
			'edit' => false,
			'equipments' => $this->equipmentsModel->getDetails(['quantity !=' => 0]),
		];
			if(session()->get('role_id') <= 2){
				$data['reservations'] = $this->reservationsModel->get();
			}else{
				$data['reservations'] = $this->reservationsModel->get(['frbs_reservations.user_id' => session()->get('id')]);
			}

		if ($this->request->getMethod() == 'post') {
			if (!$this->validate('borrowedEquipments')) {
				$data['errors'] = $this->validation->getErrors();
				$data['value'] = $_POST;
			} else {
					$reservations = $this->reservationsModel->get(['frbs_reservations.id' => $_POST['reservation_id']])[0];
					$equipments = $_POST['equipments'];
					$flag = false;
					$quantity_new = 0;
					$borrowedId = 0;
					$additional = 0;
					foreach($equipments as $equipment){
						$quantities = array_filter($_POST['quantity']);
						$borrowedEquipments = $this->borrowedEquipmentsModel->get(['reservation_id' => $reservations['id']]);
						$eachEquipment = $this->equipmentsModel->get(['frbs_equipments.id' => $equipment])[0];

						foreach($borrowedEquipments as $borrowedEquipment){
							if($borrowedEquipment['equipment_id'] == $equipment){
								$flag = true;
								$additional = $borrowedEquipment['quantity'];
								$borrowedId = $borrowedEquipment['id'];
							}
						}

						if($flag){
							foreach($quantities as $quantity){
								$quantity_new = $quantity; 
								break;
							}
							$equipmentData['quantity'] = $eachEquipment['quantity'] - $quantity_new;
							$borrowedEquipmentData['quantity'] = $additional + $quantity_new;
							$this->borrowedEquipmentsModel->update($borrowedId, $borrowedEquipmentData);
						}else{
							$_POST['user_id'] = session()->get('id');
							$_POST['reservation_id'] = $reservations['id'];
							$_POST['equipment_id'] = $equipment;
							$_POST['status_id'] = 4;
							foreach($quantities as $quantity){
								$_POST['quantity'] = $quantity; 
								$quantity_new = $quantity;
								break;
							}
							$this->borrowedEquipmentsModel->add($_POST);
							$equipmentData['quantity'] = $eachEquipment['quantity'] - $quantity_new;
						}
						
						if($equipmentData['quantity'] == 0){
							$equipmentData['status_id'] = 5;
						}else{
							$equipmentData['status'] = 6;
						}
						
						$this->equipmentsModel->update($equipment, $equipmentData);

						array_shift($quantities);
						$flag = false;
						$quantity_new = 0;
						$borrowedId = 0;
						$additional = 0;
				}
				$this->session->setFlashdata('success', 'Successfull Registration');
				return redirect()->to('/borrowed-equipments');
			}
		}

		return view('templates/index', $data);
	}
	
	public function delete($id)
	{
			$borrowed = $this->borrowedEquipmentsModel->get(['id' => $id])[0];
				$eachDelEquipment = $this->equipmentsModel->get(['frbs_equipments.id' => $borrowed['equipment_id']])[0];
				if($eachDelEquipment['quantity'] == 0){
					$equipmentDelData['status_id'] = 6;
				}
				$eachDelEquipment['quantity'] += $borrowed['quantity'];
				$equipmentDelData['quantity'] = $eachDelEquipment['quantity']; 

				$this->equipmentsModel->update($eachDelEquipment['id'], $equipmentDelData);
				$this->borrowedEquipmentsModel->softDelete($borrowed['id']);
		return redirect()->to('/borrowed-equipments');
	}
	//--------------------------------------------------------------------
}
