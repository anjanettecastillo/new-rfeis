<?php

namespace Modules\ReservationManagement\Models;

use App\Models\BaseModel;

class ReservationsModel extends BaseModel
{
    protected $table = 'frbs_reservations';
    protected $allowedFields = [
        'reservation_code',
        'user_id',
        'organization_id',
        'course_id',
        'event_name',
        'event_type_id',
        'facility_id',
        'faculty_id',
        'status_id',
        'budget',
        'participants_count',
        'reservation_date',
        'reservation_starting_time',
        'reservation_end_time',
        'reservation_fee',
        'remarks',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function getDetails($conditions = []){
        $this->select('frbs_reservations.*, t.event_type, f.facility_name, f.facility_fee, f.capacity, f.image, p.last_name, p.first_name, TIMEDIFF(frbs_reservations.reservation_end_time,frbs_reservations.reservation_starting_time) as \'duration\', m.reservation_remarks');
        $this->join('frbs_event_types as t',  'frbs_reservations.event_type_id = t.id');
        $this->join('frbs_facilities as f',  'frbs_reservations.facility_id = f.id');
        $this->join('frbs_faculties as p',  'frbs_reservations.faculty_id = p.id');
        $this->join('frbs_reservation_remarks as m',  'frbs_reservations.status_id = m.id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        $this->orderBy('status_id', 'DESC');
        $this->orderBy('id', 'ASC');
	    return $this->findAll();
    }
    public function getReservationData($arg){
        $this->select('count(id) as count');
        $this->where(['month(reservation_date)' => $arg]);
        return $this->findAll();
    }

}
