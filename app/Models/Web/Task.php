<?php

namespace Sagmma\Models\Web;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    // protected $fillable = ['name', 'nickname', 'ic', 'nif', 'birthdate', 'phone', 'type'];
    protected $guarded = ['id'];

    //Relacionamentos;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
