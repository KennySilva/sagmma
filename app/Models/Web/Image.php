<?php

namespace Sagmma\Models\Web;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    protected $guarded = ['id'];

    //Relacionamentos;
    public function article()
    {
        return $this->belongsTo(Article::class);
    }

}
