<?php

namespace Sagmma\Models\Sys;

use Illuminate\Database\Eloquent\Model;

class Article_Tag extends Model
{
    protected $table = 'article_tag';
    protected $guarded = ['id', 'tag_id', 'article_id'];
    public $timestamps = false;
}
