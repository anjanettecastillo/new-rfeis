<?php

namespace App\Models;

use CodeIgniter\Model;

class BaseModel extends Model
{
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $useSoftDeletes = true;


    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function get($conditions = [])
    {
        foreach($conditions as $field => $value){
            $this->where($field, $value);
        }

        return $this->findAll();
    }

    public function add($data)
    {
        $data['status'] = 'a';
        return $this->save($data);
    }

    public function edit($id, $data)
    {
        $time = new \DateTime();
        $data['updated_at'] = $time->format('Y-m-d H:i:s');
        return $this->update($id, $data);
    }

    public function softDelete($id)
    {
        $data['status'] = 'd';
        $this->update($id, $data);
        return $this->delete($id);
    }

}
