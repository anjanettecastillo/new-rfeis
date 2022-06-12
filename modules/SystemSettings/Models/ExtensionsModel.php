<?php namespace Modules\SystemSettings\Models;

use App\Models\BaseModel;

class ExtensionsModel extends BaseModel
{
    protected $table = 'frbs_extension_names';
    protected $allowedFields = [
        'extension_name', 
        'description',
        'status', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

}
