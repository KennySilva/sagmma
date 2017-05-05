<?php

namespace Sagmma\Models\Sagmma;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use User;

class Taxation extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'employee_place';
    protected $guarded = ['id'];

    public function getAuthorAttribute($value)
    {
        if ($value) {
            $author = User::find($value);
        }
        return $author->name;
    }

    //------------------------------------------------------------------------------
    public function employees()
    {
        return $this->hasMany(Employee::class, 'id', 'employee_id');
    }
    public function places()
    {
        return $this->hasMany(Place::class, 'id', 'place_id');
    }
}
