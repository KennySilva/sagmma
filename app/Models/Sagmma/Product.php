<?php

namespace Sagmma\Models\Sagmma;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $guarded = ['id'];

    //Relacionamentos;
    public function promotions()
    {
        return $this->hasMany(Promotion::class);
    }
}
