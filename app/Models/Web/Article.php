<?php

namespace Sagmma\Models\Web;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $guarded = ['id'];

    public function getStatusAttribute($value)
    {
        if ($value) {
            return true;
        }
        return false;
    }

    public function getFeaturedAttribute($value)
    {
        if ($value) {
            return true;
        }
        return false;
    }

    //Relacionamentos;
    public function menus()
    {
        return $this->belongsTo(Menu::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'article_tag', 'article_id', 'tag_id');
    }




}
