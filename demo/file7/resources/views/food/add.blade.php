@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{route('food.store') }} " method="post" enctype="multipart/form-data">
                @csrf
                <div class="card text-center">
                    <div class="card-header">
                        <h4>Add new Food</h4>
                    </div>
                    <div class="card-body form-group">
                        <label for="food_name">Food name</label>
                        <input type="text" id='food_name' name='food_name' class="form-control"
                                                    placeholder="Set the food name here">
                    </div>

                    <div class="card-body form-group">
                        <label for="food_description">Food description</label>
                        <textarea name="food_description" id="food_description" rows="5" style="width: 100%"
                                placeholder="Set the food description here"></textarea>
                    </div>

                    <div class="card-body form-group">
                        <label for="food_price">Food price</label>
                        <input type="text" id='food_price' name='food_price' class="form-control"
                                                    placeholder="Set the food price here">
                    </div>

                    <div class="card-body form-group">
                        <label for="food_price">Food price</label>
                        <select name="food_category_name" id="food_category_name" >
                            @foreach ($categories_list as $k=>$category)
                                <option value="{{$category['name']}}"> {{$category['name']}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="card-body form-group">
                        <label for="food_image">Food image</label>
                        <input type="file" id='food_image' name='food_image' class="form-control" >
                    </div>
                    <input type="submit" value="SUBMIT">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
