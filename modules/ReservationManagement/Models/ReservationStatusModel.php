<?php

namespace Modules\ReservationManagement\Models;

use App\Models\BaseModel;

class ReservationStatusModel extends BaseModel
{
    protected $table = 'frbs_reservation_status';
    protected $allowedFields = [
        'reservation_id',
        'status_id',
        'reservation_fee',
        'remarks',
        'receipt',
        'is_checked',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function getDetails($conditions = []){
        $this->select('frbs_reservation_status.*, r.event_name, r.reservation_date, f.facility_name, t.event_type, m.reservation_remarks');
        $this->join('frbs_reservations as r',  'frbs_reservation_status.reservation_id = r.id');
        $this->join('frbs_event_types as t',  'r.event_type_id = t.id');
        $this->join('frbs_facilities as f',  'r.facility_id = f.id');
        $this->join('frbs_reservation_remarks as m',  'frbs_reservation_status.status_id = m.id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }

	    return $this->findAll();
    }
    public function getDetailedReport($conditions = []){
        $this->select('frbs_reservation_status.*, r.*,CONCAT(u.first_name, " " ,u.last_name) as user, f.facility_name, t.event_type, m.reservation_remarks');
        $this->join('frbs_reservations as r',  'frbs_reservation_status.reservation_id = r.id');
        $this->join('frbs_event_types as t',  'r.event_type_id = t.id');
        $this->join('frbs_users as u',  'r.user_id = u.id');
        $this->join('frbs_facilities as f',  'r.facility_id = f.id');
        $this->join('frbs_reservation_remarks as m',  'frbs_reservation_status.status_id = m.id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        $this->orderBy("r.reservation_date", "desc");
	    return $this->findAll();
    }

}
