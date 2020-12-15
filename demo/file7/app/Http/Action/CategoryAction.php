<?php

namespace App\Http\Action;

use App\Category;
use App\Http\Action\FoodAction;

class CategoryAction
{
    /**
     * This function return an array of all categories in database, latest first
     * and an array of foods in each category
     * @return array[array[Food]] 2D array for categories and foods in a specified categories;
     * the category 's name will be used as the key of the first level array ($category_name => $food_list)
     * the returned array is formatted: [$category_name => $food_list]
     * ($food_list is foods array corresponding with the category)
     */
    public function get_categories_list()
    {
        $food_action = new FoodAction();
        $array_result = [];
        $list_categories = Category::all()->reverse();

        // we know that each item in the array $list_categories is an instance of Category class
        // and we need to handle to get the returned value as an array (to load it into blade view file)
        foreach ($list_categories as $k => $category) {
            $food_list = $food_action->get_list_4_food($category->id);

            // This statement will set pair $key => $value in format:
            // the key of array to be category name, and the value of array is the corresponding foods array
            $array_result[$category->name] = $food_list;
        }
        return $array_result;
    }

    /**
     * This function return the category id by name
     * @param string $name is the name of the category which is searched
     * @return int the corresponding id of the specified named category
     */
    public function get_category_id_by_name(string $name)
    {
        $category_in_array = Category::where('name', $name)->get()->all();
        // dd($category_in_array);
        // we know that each item in the array $category_in_array is an instance of Category class
        // whose property $id is fillable
        return $category_in_array[0]->id;
    }

    /**
     * This function return an array including all categories
     * @return array[Category] array including items which is Category instances
     */
    public function get_all_categories()
    {
        $list_categories = Category::all()->reverse();
        return $list_categories->all();
    }

    /**
     * This function will handle the task: save a particular Category instance and return NOTHING
     * @param Category $category is a Category instance offered by form in view category/add.blade.php
     * @param string $method "PUT" (update Category) or "POST" (add new Category)
     * @return string this annoucement will be passed to view category/list.blade.php as $annouce variable
     */
    public function save_category(Category $category, string $method)
    {
        $list_categories = Category::all()->reverse();
        foreach ($list_categories as $k => $category_instance) {
            if (trim($category_instance->name) == trim($category->name)) {
                return "This category name is existing in database";
            }
        }
        $category->save();
        return "One Category instance has been saved";
    }
}