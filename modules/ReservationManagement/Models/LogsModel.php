<?php

namespace Modules\ReservationManagement\Models;

use App\Models\BaseModel;

class LogsModel extends BaseModel
{
    protected $table = 'frbs_logs';
    protected $allowedFields = [
        'user_id',
        'reservation_id',
        'description',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function getDetails($conditions = []){
        $this->select('frbs_logs.*, frbs_logs.id as lid, u.first_name, r.role_name');
        $this->join('frbs_users as u',  'frbs_logs.user_id = u.id');
        $this->join('frbs_roles as r',  'u.role_id = r.id');
        
        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        
        $this->orderBy('lid', 'desc');

	    return $this->findAll();
    }

}
