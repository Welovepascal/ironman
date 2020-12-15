<?php

namespace App\Http\Action;

use App\Category;
use App\Food;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FoodAction
{

    /**
     * This funtion load 4 items (Food) of a specified Category (latest first), it will be show in home.blade.php
     * @param int $cate_id is the id of a specified category (passed from TotalController)
     * @return array[Food] the array 4 items of food (Food instances) of the specified category (by $category_id)
     */
    public function get_list_4_food(int $cate_id)
    {
        $list_of_4 = [];
        $foods_collection = Food::where('category_id', $cate_id)->get()->reverse();

        // If the number of items more than or equal to 4, we just load only 4 items;
        // if it 's less than 4, we load all of them.
        // The $showed_items_number for count the number of items will be loaded
        $showed_items_number = ($foods_collection->count() >= 4) ? 4 : $foods_collection->count();
        for ($i = 0; $i < $showed_items_number; $i++) {
            array_push($list_of_4, $foods_collection->get($i));
        }
        return $list_of_4;
    }

    /**
     * This function load the list of foods in a specified (by $category_id) category
     * @param int $category_id is the id of specified category
     * @return array[Food] the array of food (Food instances) of the specified category (by $category_id)
     */
    public function get_list_all_food_by_category(int $category_id)
    {
        $foods_array = Food::where('category_id', $category_id)->get()->reverse()->all();
        return $foods_array;
    }

    /**
     * This function load list all of foods stored in Database
     * @return array[Food] the array of food (Food instances) stored in Database
     */
    public function get_list_all_food_with_category_name()
    {
        $foods_array = Food::all()->reverse()->all();

        // We know that all variables $food (below) is a Food instances,
        // and they have the custom attribute "category_name"
        foreach ($foods_array as $k => $food) {
            $category = Category::find($food->category_id);
            $food->category_name = $category->id;
        }
        return $foods_array;
    }

    /**
     * Get the Food instance by id. set Category_name for it (base on corresponding 'category_id' attribute)
     * @param int $food_id is the id of Food instance offered
     * @return Food instance with the attribute 'category_name' which was set
     */
    public function get_food_with_category_name(int $food_id)
    {
        $food = Food::find($food_id);
        $category_id = $food->category_id;
        $category = Category::find($category_id);

        // The Accessor of Food Class take $category_id as its parameter, because of convinient
        // and avoiding problem when the name in the url path might be encoded
        $food->category_name = $category->id;
        return $food;
    }

    /**
     * This function saving the offered file (photo) from Request object. This private function
     * will be call by an another function below: save_food()
     * @param UploadedFile $file the UploadedFile instance offered by view form
     * @param string $food_img_link is the id of food which have the corresponding uploaded photo
     */
    private function save_photo(UploadedFile $file = null, string $food_img_link)
    {
        if ($file == null) {
            return;
        }
        $extension = $file->getClientOriginalExtension();
        // $file must be a photo
        $is_photo = $extension == "jpg" || $extension == "png"
            || $extension == "jpeg" || $extension == "gif";
        if ($is_photo) {
            $file->storeAs('images', $food_img_link, "uploads");
        }
    }

    /**
     * This function save the Food instance to database and store its image
     * @param Food $food is the Food instance created by the request variables get from view form
     * @param UploadedFile $file the photo uploaded by view form
     * @param string $method 'PUT' (update food) or 'POST' (add new Food)
     * @return string this annoucement will be passed to view category/list.blade.php as $annouce variable
     */
    public function save_food(Food $food, UploadedFile $file = null, string $method)
    {
        // If we create a Food instance (method POST) but don't upload the photo.
        // THis funcion will died with an alert
        if ($file == null && strtoupper($method) == "POST") {
            die("The file is not passed or uploađed!! Check again");
        }
        $list_all_food = $this->get_list_all_food_with_category_name();
        // First check if the food name is existing or not
        foreach ($list_all_food as $k => $food_instances) {
            if (trim($food->name) == trim($food_instances->name) && strtoupper($method) == "POST") {
                return "This food name is existing in database";
            }
        }
        // Next, save the file. The file name has been set as the 'id' attribute of the Food instance
        // (in FoodController.php). It 's concurrently is the attribute 'img_link' of Food instance
        $this->save_photo($file, $food->img_link);
        // if the method is "PUT" (update new Food), we need to remove the old photo after upload the new one
        $food->save();
        return "One Food instance has been saved";
    }
}