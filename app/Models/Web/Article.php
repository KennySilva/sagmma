<?php

namespace Sagmma\Models\Web;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use Sluggable;
    protected $table = 'articles';
    protected $guarded = ['id'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'article_tag', 'article_id', 'tag_id');
    }

    public static function findBySlugOrFail($slug, $columns = array('*') )
    {
        if ( ! is_null($slug = static::whereSlug($slug)->first($columns))) {
            return $slug;
        }

        throw new ModelNotFoundException;
    }


}
