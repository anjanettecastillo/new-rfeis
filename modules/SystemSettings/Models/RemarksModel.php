<?php namespace Modules\SystemSettings\Models;

use App\Models\BaseModel;

class RemarksModel extends BaseModel
{
    protected $table = 'frbs_reservation_remarks';
    protected $allowedFields = [
        'reservation_remarks', 
        'description',
        'status', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

}
