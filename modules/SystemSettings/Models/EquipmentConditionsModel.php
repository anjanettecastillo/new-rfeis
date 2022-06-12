<?php namespace Modules\SystemSettings\Models;

use App\Models\BaseModel;

class EquipmentConditionsModel extends BaseModel
{
    protected $table = 'frbs_equipment_conditions';
    protected $allowedFields = [
        'equipment_condition', 
        'description',
        'status', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

}
