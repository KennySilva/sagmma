<?php

namespace Sagmma\Models\Web;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $guarded = ['id'];

    //Relacionamentos;


    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

}
