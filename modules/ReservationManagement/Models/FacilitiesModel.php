<?php namespace Modules\ReservationManagement\Models;

use App\Models\BaseModel;

class FacilitiesModel extends BaseModel
{
    protected $table = 'frbs_facilities';
    protected $allowedFields = [
        'facility_code',
        'facility_name',
        'description',
        'image',
        'capacity',
        'facility_fee',
        'facility_status_id',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'];

    public function getDetails($conditions = []){

        $this->select('frbs_facilities.*, fs.facility_status');
        $this->join('frbs_facility_status as fs', 'frbs_facilities.facility_status_id = fs.id');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }

        return $this->findAll();
    }
    public function getFacilityData(){
        $this->select('COUNT(r.facility_id) as facility_count, frbs_facilities.facility_name');
        $this->join('frbs_reservations r', 'r.facility_id = frbs_facilities.id');
        $this->where(['r.status' => 'a']);
        $this->groupBy('r.facility_id');

        return $this->findAll();
    }
}
