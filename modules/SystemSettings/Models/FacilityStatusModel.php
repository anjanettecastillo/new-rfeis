<?php namespace Modules\SystemSettings\Models;

use App\Models\BaseModel;

class FacilityStatusModel extends BaseModel
{
    protected $table = 'frbs_facility_status';
    protected $allowedFields = [
        'facility_status', 
        'description', 
        'status', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

}
