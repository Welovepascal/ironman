@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (!$food)
                <h2>There is nothing to update</h2>
            @else
                <form action="{{route('food.update',['food' => $food['id']] ) }} "
                                            method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card text-center">
                        <div class="card-header">
                            <h4>Update food which have id: {{$food['id']}} </h4>
                        </div>
                        <div class="card-body form-group form-inline">
                            <label for="food_name" class="pr-2">Food name</label>
                            <input type="text" id='food_name' name='food_name' class="form-control"
                                    value="{{$food['name']}}" placeholder="Set the food name here">
                        </div>

                        <div class="card-body form-group text-left">
                            <label for="food_description">Food description</label>
                            <textarea name="food_description" id="food_description" rows='5'
                                style="width:100%;" >{{$food['description']}}</textarea>
                        </div>

                        <div class="card-body form-group form-inline">
                            <label for="food_price" class="pr-2">Food price</label>
                            <input type="text" id='food_price' name='food_price' class="form-control"
                                value='{{$food['price']}}' placeholder="Set the food price here">
                        </div>

                        <div class="card-body form-group form-inline">
                            <label for="food_category_name" class="pr-2">Category name</label>
                            <select name="food_category_name" id="food_category_name" >
                                @foreach ($categories_list as $k=>$category)
                                    <option value="{{$category['name']}}"
                                        {{($category['id']==$food['category_id'])? 'selected' : ''}}>
                                        {{$category['name']}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="card-body form-group text-left">
                            <label for="food_image">Food image</label>
                            <img src="{{url('/')}}/images/{{$food['img_link']}} "
                                alt="{{$food['name']}} "  style="width: 40%;">
                            <br>
                            <input type="file" id='food_image' name='food_image' class="form-control" >
                        </div>
                        <input type="submit" value="SUBMIT">
                    </div>
                </form>
            @endif

        </div>
    </div>
</div>
@endsection
