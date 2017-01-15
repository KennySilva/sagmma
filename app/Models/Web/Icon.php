<?php

namespace Sagmma\Models\Web;

use Illuminate\Database\Eloquent\Model;

class Icon extends Model
{
    protected $table = 'icons';

/**
* The attributes that are mass assignable.
*
* @var array
*/
// protected $fillable = ['name', 'type', 'description'];
    protected $guarded = ['id'];

    //Relacionamentos;

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }    
}
