<?php

namespace Sagmma\Models\Sagmma;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'materials';

    protected $guarded = ['id'];

    //Relacionamentos;
    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_material', 'material_id', 'employee_id')->withPivot('status', 'author')->withTimestamps();
    }

    public function control()
    {
        return $this->belongsTo(Control::class,  'material_id',  'id');
    }
}
