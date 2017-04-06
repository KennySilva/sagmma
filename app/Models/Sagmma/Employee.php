<?php

namespace Sagmma\Models\Sagmma;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';

    protected $guarded = ['id'];



    //Relacionamentos;
    // public function market()
    // {
    //     return $this->belongsTo(Market::class);
    // }
    //------------------------------------------------------------
    public function markets()
    {
        return $this->belongsToMany(Market::class, 'employee_market', 'employee_id', 'market_id')->withPivot('author')->withTimestamps();
    }

    // public function tranference()
    // {
    //     return $this->belongsTo(Transference::class, 'employee_id', 'id');
    // }

    public function taxation()
    {
        return $this->belongsTo(Taxation::class, 'id', 'employee_id');
    }

    public function typeofemployees()
    {
        return $this->belongsTo(Typeofemployee::class, 'typeofemployee_id', 'id');
    }
    //------------------------------------------------------------

    public function controls()
    {
        return $this->belongsTo(Control::class, 'id', 'employee_id');
    }

    public function materials()
    {
        return $this->belongsToMany(Material::class, 'employee_material', 'employee_id', 'material_id')->withPivot('status', 'author')->withTimestamps();
    }
    // ----------------------------------------------------------
    public function places()
    {
        return $this->belongsToMany(Place::class, 'employee_place', 'employee_id', 'place_id')->withPivot('income', 'type', 'author')->withTimestamps();
    }

}
