<?php

namespace Sagmma\Models\Web;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $guarded = ['id'];
    // protected $fillable = ['name', 'nickname', 'ic', 'nif', 'birthdate', 'phone', 'type'];


    //Relacionamentos;

    public function icon()
    {
        return $this->belongsTo(Icon::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function article()
    {
        return $this->hasOne(Article::class);
    }
}
