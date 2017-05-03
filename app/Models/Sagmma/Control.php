<?php

namespace Sagmma\Models\Sagmma;
use User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Control extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'employee_material';
    protected $guarded = ['id'];



    //------------------------------------------------------------------------------
    public function getAuthorAttribute($value)
    {
        if ($value) {
            $author = User::find($value);
        }
        return $author->name;
    }

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
