@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (!$food)
                <h2>There is nothing to update</h2>
            @else
                <div class="card text-center">
                    <div class="card-header">
                        <h4>Show info of the food which have id: {{$food['id']}} </h4>
                    </div>
                    <div class="card-body form-group form-inline font-weight-bold ">
                        <label for="food_name"  class="pr-2">Food name</label>
                        <input disabled type="text" id='food_name' name='food_name' class="form-control"
                                value="{{$food['name']}}" placeholder="Set the food name here">
                    </div>

                    <div class="card-body form-group text-left">
                        <label for="food_description" class="">Food description</label>
                        <textarea disabled name="food_description" id="food_description" rows="5"
                            style="width: 100%; ">{{$food['description']}}</textarea>
                    </div>

                    <div class="card-body form-group form-inline">
                        <label for="food_price" class="pr-2">Food price</label>
                        <input disabled type="text" id='food_price' name='food_price' class="form-control"
                            value='${{$food['price']}}' >
                    </div>

                    <div class="card-body form-group form-inline">
                        <label for="category_name" class="pr-2">Category</label>
                        <input disabled type="text" id='category_name' name='category_name'
                            class="form-control" value='{{$food['category_name']}}' >
                    </div>


                    <div class="card-body form-group  text-left">
                        <label for="food_image">Food image</label>
                        <img src="{{url('/')}}/images/{{$food['img_link']}} "
                                style="width: 40%" alt="{{$food['name']}} ">
                        <br>
                        <input type="hidden" id='food_image' name='food_image' class="form-control" >
                    </div>
                </div>
                <a href="{{route('food.edit',['food'=>$food['id']] )}} " class="btn btn-info ml-5 mr-5">
                    Go to Edit page
                </a>
                <a href="{{route('food.gotodelete', ['id'=>$food['id']] ) }} "
                    class="btn btn-danger ml-5">Go to Delele Page</a>
            @endif

        </div>
    </div>
</div>
@endsection
