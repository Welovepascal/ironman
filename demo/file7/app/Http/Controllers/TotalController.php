<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
use App\Category;
use App\Http\Action\CategoryAction;
use App\Http\Action\FoodAction;
use App\Http\Action\TotalAction;
use Illuminate\Support\Facades\Auth;

class TotalController extends Controller
{
    /**
     * This function load 4 food of all categories
     * @return view direct to the home.blade.php with an array includes subarrays, which are
     * arrays of 4 food (Food instance).
     * Each subarray is a rally of 4 Food's instances which have a same particular $category_id
     */
    public function load_4_food_of_all_categories()
    {
        $category_action = new CategoryAction();
        $array_result = $category_action->get_categories_list();
        return view('home')->with('categories_list_for_home', $array_result);
    }

    /**
     * Go to the category/delete.blade.php
     * @param int $category_id is the id of specified Category instance needed to be deleted
     * @return view go to category/delete.blade.php with variable which is Category instance
     */
    public function go_to_delete_category_page(int $category_id)
    {
        // suppose that email "nguye@gmail.com" is the admin email of this web app
        // those codes will accept only the admin "nguye@gmail.com" having permission to
        // go to Edit page and Delete page
        if (Auth::user()->email != "nguye@gmail.com") {
            die("You have no permission to go to the Category deleting form");
        }
        $category = Category::find($category_id);
        return view('category.delete')->with('category', $category);
    }

    /**
     * Go to the food/delete.blade.php
     * @param int $food_id is the id of specified Food instance needed to be deleted
     * @return view go to food/delete.blade.php with variable 'food_id'
     */
    public function go_to_delete_food_page(int $food_id)
    {
        // suppose that email "nguye@gmail.com" is the admin email of this web app
        // those codes will accept only the admin "nguye@gmail.com" having permission to
        // go to Edit page and Delete page
        if (Auth::user()->email != "nguye@gmail.com") {
            die("You have no permission to go to the Food deleting form");
        }
        $food = Food::find($food_id);
        return view('food.delete')->with('food', $food);
    }
}
