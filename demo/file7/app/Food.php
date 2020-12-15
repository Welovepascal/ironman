<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Food extends Model
{
    // NOTE: the 'img_link' attribute will be set as: $food->img_link = $food->id . '.png'
    protected $fillable = ['id', 'name', 'description', 'price', "category_id", 'img_link'];
    protected $appends = ['category_name'];

    /**
     * We need create a field "category_name" which is not exist as a collumn in database.
     * So we use variable "$appends" and Accessor methods "getCategoryNameAttribute" to do it.
     * Read more about Laravel Accessor & Mutator method in Laravel Docs:
     * https://laravel.com/docs/5.8/eloquent-mutators
     * @param int $category_id is the id of category passed by action classes
     * The Accessor of Food Class take $category_id as its parameter,
     * because of convinient and avoiding troubles when the name in the url path might be encoded
     */
    public function getCategoryNameAttribute($category_id)
    {
        $category_name = '';
        if ($category_id) {
            $category_name = Category::find($category_id)->name;
        }
        return $category_name;
    }
}
