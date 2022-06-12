<?php

namespace Modules\EquipmentManagement\Models;

use App\Models\BaseModel;

class BorrowedEquipmentsModel extends BaseModel
{
    protected $table = 'frbs_borrowed_equipments';
    protected $allowedFields = [
        'user_id',
        'reservation_id',
        'equipment_id',
        'status_id',
        'quantity',
        'returned_quantity',
        'condition_id',
        'remarks',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function getDetails($conditions = []){
        $this->select('frbs_borrowed_equipments.*, r.event_name, e.equipment_name, e.image, s.equipment_status');
        $this->join('frbs_reservations as r', 'frbs_borrowed_equipments.reservation_id = r.id');
        $this->join('frbs_equipments as e', 'frbs_borrowed_equipments.equipment_id = e.id');
        $this->join('frbs_equipment_status as s', 'frbs_borrowed_equipments.status_id = s.id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }

	    return $this->findAll();
    }
}
