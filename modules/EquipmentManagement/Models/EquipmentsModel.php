<?php namespace Modules\EquipmentManagement\Models;

use App\Models\BaseModel;

class EquipmentsModel extends BaseModel
{
    protected $table = 'frbs_equipments';
    protected $allowedFields = [
        'equipment_code',
        'equipment_name',
        'description',
        'image',
        'quantity',
        'status_id',
        'condition_id',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'];

    public function getDetails($conditions = []){

        $this->select('frbs_equipments.*, es.equipment_status, ec.equipment_condition');
        $this->join('frbs_equipment_status as es', 'frbs_equipments.status_id = es.id');
        $this->join('frbs_equipment_conditions as ec', 'frbs_equipments.condition_id = ec.id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }

        return $this->findAll();
    }
}
