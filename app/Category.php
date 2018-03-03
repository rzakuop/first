<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected static function boot()
    {
        parent::boot();

        static::updated(function($user) {
        });
    }

    protected $fillable = [
        'parent_id', 'name',
    ];

    public function parent()
    {
        return $this->belongsTo('App\Category', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Category', 'parent_id');
    }

    public static function topCategories()
    {
        return Category::whereNull('parent_id')
            ->orderBy('id', 'asc')
            ->get()
            ;
    }

    public static function topicCategoryIds($categoryId)
    {
        $category = Category::find($categoryId);
        if (!$category) return [];
        $ids = [$category->id];

        while(true) {
            $category = $category->parent;

            if (!$category)
                break;

            array_unshift($ids, $category->id);
        }

        return $ids;
    }

    public static function topicCategoryNames($categoryId)
    {
        $category = Category::find($categoryId);
        if (!$category) return '';
        $names = $category->name;

        while(true) {
            $category = $category->parent;

            if (!$category)
                break;

            $names = $category->name . " > " . $names;
        }

        return $names;
    }
}
