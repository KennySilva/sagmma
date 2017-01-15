<?php

namespace Sagmma\Models\Sagmma;

use Illuminate\Database\Eloquent\Model;

class Control extends Model
{
    protected $table = 'employee_material';
    protected $guarded = ['id'];



    //------------------------------------------------------------------------------
    public function getStatusAttribute($value)
    {
        if ($value) {
            return true;
        }
        return false;
    }


    public function employees()
    {
        return $this->hasMany(Employee::class, 'id', 'employee_id');
    }

    public function materials()
    {
        return $this->hasMany(Material::class, 'id', 'material_id');
    }
}
