<?php

namespace App\Http\Controllers;

use App\Food;
use App\Http\Action\CategoryAction;
use App\Http\Action\FoodAction;
use App\Http\Action\TotalAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FoodController extends Controller
{
    /**
     * Display a listing all the foods. This function is called by route(food.index) <=> "/food"
     * @return view go to food/all_foods.blade.php with parameters
     * is an array of all Food instances stored in Database
     */
    public function index()
    {
        $action = new FoodAction();
        $food_list = $action->get_list_all_food_with_category_name();
        return view('food.all_foods')->with('food_list', $food_list);
    }

    /**
     * Show the form for creating a new Food instance (Go to food/add.blade.php).
     *
     * @return view go to food/add.blade.php
     * with $category_list is an array of all Category instances in database
     */
    public function create()
    {
        // suppose that email "nguye@gmail.com" is the admin email of this web app
        // those codes will accept only the admin "nguye@gmail.com" having permission to
        // go to Create, Edit page and Delete page
        if (Auth::user()->email != "nguye@gmail.com") {
            die("You have no permission to go to the Food creating form");
        }
        $category_action = new CategoryAction();
        $category_list = $category_action->get_all_categories();
        return view('food.add')->with('categories_list', $category_list);
    }

    /**
     * Store a newly created Food into database.
     *
     * @param  \Illuminate\Http\Request  $request get from view form
     * @return view go to food/all_foods.blade.php with 2 variables:
     * $food_list (an array of Food instances) and $announce (string)
     */
    public function store(Request $request)
    {
        $new_food = new Food();
        $new_food->name = $request->food_name;
        $new_food->description = $request->food_description;
        $new_food->price = $request->food_price;
        // $new_food->category_name = $request->food_category_name;
        // get file from $request
        $file = $request->file('food_image');

        // we need to use some logical scripts to generate the values for attributes
        // 'img_link' and 'category_id' (They are needed to save a Food instance to database)
        // the 'img_link' will be set as the auto-incresed id of the new Food instance
        // we can find the id of new Food instance by using method DB::select() and access to the
        // MySQL built-in table information_schema.TABLES
        $new_food->img_link = (DB::select('SELECT AUTO_INCREMENT
                                FROM information_schema.TABLES
                                WHERE TABLE_SCHEMA = "restaurant_foodie"
                                AND TABLE_NAME = "food"')[0]->AUTO_INCREMENT) . '.png';
        // call CategoryAction instance 's method get_category_id_by_name to get category_id
        $category_action = new CategoryAction();
        $new_food->category_id = $category_action->get_category_id_by_name($request->food_category_name);
        // Now save the Food instance and get the parameters $announce and $food_list
        // (which will be loaded to view)
        $food_action = new FoodAction();
        $announce = $food_action->save_food($new_food, $file, $request->method());
        $food_list = $food_action->get_list_all_food_with_category_name();

        return view('food.all_foods')->with('announce', $announce)
            ->with('food_list', $food_list);
    }

    /**
     * Go to the view food/detail.blade.php, by the route('food.show'). This view show the detail
     * of specified food (which is Food instance) by its attribute 'id'
     * @param  int  $id is the 'id' attribute of a Food instance,
     * corresponding to collumn 'id' of Food table in database
     * @return view to file food/detail.blade.php, with parameter is a Food instance specified by id
     */
    public function show($id)
    {
        $food_action = new FoodAction();
        $food = $food_action->get_food_with_category_name($id);
        return view('food.detail')->with('food', $food);
    }

    /**
     * Show the form for editing the specified Food instance.
     * @param  int  $id is the 'id' attribute of a Food instance
     * @return view Go to the view food/update.blade.php, by the route('food.edit') with 2 parameters:
     * $food (Food instance), and $category_list is an array of all Category instances in database
     */
    public function edit($id)
    {
        // suppose that email "nguye@gmail.com" is the admin email of this web app
        // those codes will accept only the admin "nguye@gmail.com" having permission to
        // go to Create, Edit page and Delete page
        if (Auth::user()->email != "nguye@gmail.com") {
            die("You have no permission to go to the Food editting form");
        }
        $food_action = new FoodAction();
        $category_action = new CategoryAction();
        $category_list = $category_action->get_all_categories();
        $food = $food_action->get_food_with_category_name($id);
        return view('food.update')->with('food', $food)->with('categories_list', $category_list);
    }

    /**
     * UPdate a Food instance by its id.
     *
     * @param  \Illuminate\Http\Request  $request get from view form
     * @param int $id id of the updating Food instance
     * @return view go to food/all_foods.blade.php with 2 variables:
     * $food_list (an array of Food instances) and $announce (string)
     */
    public function update(Request $request, $id)
    {
        $new_food = Food::find($id);
        $new_food->name = $request->food_name;
        $new_food->description = $request->food_description;
        $new_food->price = $request->food_price;
        // get file from $request
        $file = $request->file('food_image');
        // The "img_link" is not needed to be changed

        // call CategoryAction instance 's method get_category_id_by_name to get category_id
        $category_action = new CategoryAction();
        $new_food->category_id = $category_action->get_category_id_by_name($request->food_category_name);
        // Now save the Food instance and get the parameters $announce and $food_list
        // (which will be loaded to view)
        $food_action = new FoodAction();
        $announce = $food_action->save_food($new_food, $file, $request->method());
        $food_list = $food_action->get_list_all_food_with_category_name();

        return view('food.all_foods')->with('announce', $announce)
            ->with('food_list', $food_list);
    }

    /**
     * Remove the specified Food instance from database.
     *
     * @param  int  $id of deleted food instance
     * @return view go to food/all_foods.blade.php with 2 variables:
     * $food_list (an array of Food instances) and $announce (string)
     */
    public function destroy($id)
    {
        // If the food 's id is not found in database (in case of refresh the route at second time)
        // die the program
        $food = Food::find($id);
        if (!$food) {
            die("OOPS!!! Cannot find the Food instance whose id: " . $id);
        }
        // delete the food
        $food->delete();
        // unlink the image of food
        unlink(public_path() . "/" . "images" . "/" . $food->img_link);
        // Reload a list of all Food instances remained
        $food_action = new FoodAction();
        $food_list = $food_action->get_list_all_food_with_category_name();

        return view('food.all_foods')->with('announce', 'delete successfully')
            ->with('food_list', $food_list);
    }
}