<?php

namespace App\Http\Controllers;

use App\Category;
use App\Food;
use App\Http\Action\CategoryAction;
use App\Http\Action\FoodAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing all categories .
     *
     * @return view go to category/list.blade.php with 1 parameter $categories_list.
     * $categories_list is an array including Category instances (whose 2 fillable properties: 'id", 'name')
     */
    public function index()
    {
        $category_action = new CategoryAction();
        $categories_list = $category_action->get_all_categories();
        return view('category.list')->with('categories_list', $categories_list);
    }

    /**
     * Show the form for creating a new Category, category/add.blade.php.
     *
     * @return view go to category/add.blade.php
     */
    public function create()
    {
        return view('category.add');
    }

    /**
     * Store a newly created Category instance in database. Then go to the view category/list.blade.php
     * to annouce that one more Category instance has been saved.
     * @param  \Illuminate\Http\Request  $request
     * @return view go to category/list.blade.php with variable $announce which is a string show that
     * one more Category instance has been saved, and $categories_list which is the list all categories saved
     * in database
     */
    public function store(Request $request)
    {
        // get the category name from $request
        $category = new Category();
        $category->name = $request->input('category_name');

        $category_action = new CategoryAction();
        // save category and generate variable $annouce
        $announce = $category_action->save_category($category, $request->method());
        // generate variable $categories_list
        $categories_list = $category_action->get_all_categories();
        return view('category.list')->with('announce', $announce)
            ->with('categories_list', $categories_list);
    }

    /**
     * Display the specified array of Food instances with have the same particular category .
     *
     * @param  string  $name
     * @return view to food/list.blade.php with 2 params: $category_name (string) and $food_list (array[Food])
     */
    public function show($name)
    {
        // the parameter $name get from the url path have the code '%20' replaced for the space letter,
        // so we must turn them to space letter back
        $category_name = str_replace('%20', ' ', $name);
        $food_action = new FoodAction();
        $category_action = new CategoryAction();
        $category_id = $category_action->get_category_id_by_name($category_name);
        $list_all_food = $food_action->get_list_all_food_by_category($category_id);
        // dd($list_all_food[0]['name']);
        return view('food.list')->with('food_list', $list_all_food)->with('category_name', $category_name);
    }

    /**
     * Show the form for editing the id-specified Category.
     *
     * @param  int  $id id of the Category which is needed to update
     * @return view go to category/update.blade.php, with variable $category is Category instances
     */
    public function edit($id)
    {
        // suppose that email "nguye@gmail.com" is the admin email of this web app
        // those codes will accept only the admin "nguye@gmail.com" having permission to
        // go to Edit page and Delete page
        if (Auth::user()->email != "nguye@gmail.com") {
            die("You have no permission to go to the Category editting form");
        }
        $category = Category::find($id);
        return view('category.update')->with('category', $category);
    }

    /**
     * Remove the specified Category instance (and all its Food instances)
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id of the deleted Category instance
     * @return view to category/list.blade.php with 2 variables ($annouce and $food_list)
     */
    public function update(Request $request, $id)
    {
        $category_new_name = $request->input('category_name');

        // the parameter $name get from the url path have the code '%20' replaced for the space letter,
        // so we must turn them to space letter back
        $category_new_name = str_replace('%20', ' ', $category_new_name);
        // find the Category instance with specified id and update its name
        $category = Category::find($id);
        $category->name = $category_new_name;
        // save the updated category and generate annouce
        $category_action = new CategoryAction();
        $announce = $category_action->save_category($category, $request->method());
        $categories_list = $category_action->get_all_categories();
        return view('category.list')->with('announce', $announce)
            ->with('categories_list', $categories_list);
    }

    /**
     * Remove the specified Category instance (and all its Food instances)
     *
     * @param  int  $id of the deleted Category instance
     * @return view to category/list.blade.php with 2 variables ($annouce and $food_list)
     */
    public function destroy($id)
    {
        // If the category id is not found in database (in case of refresh the route at second time)
        //die the program
        $category = Category::find($id);
        if (!$category) {
            die("OOPS!!! Cannot find the Category instance whose id: " . $id);
        }
        // First, delete all the Food instances of the deleted category
        $food_action = new FoodAction();
        $food_list = $food_action->get_list_all_food_by_category($id);
        foreach ($food_list as $k => $food) {
            Food::destroy($food->id);
        }
        // Delete the category
        Category::destroy($id);
        // Reload a list of all Category instances remained
        $category_action = new CategoryAction();
        $categories_list = $category_action->get_all_categories();
        return view('category.list')->with('announce', "delete successfully")
            ->with('categories_list', $categories_list);
    }
}