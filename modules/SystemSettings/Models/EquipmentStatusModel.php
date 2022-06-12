<?php namespace Modules\SystemSettings\Models;

use App\Models\BaseModel;

class EquipmentStatusModel extends BaseModel
{
    protected $table = 'frbs_equipment_status';
    protected $allowedFields = [
        'equipment_status', 
        'description',
        'status', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

}
