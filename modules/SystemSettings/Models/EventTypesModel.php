<?php namespace Modules\SystemSettings\Models;

use App\Models\BaseModel;

class EventTypesModel extends BaseModel
{
    protected $table = 'frbs_event_types';
    protected $allowedFields = [
        'event_type', 
        'description',
        'status', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

}
