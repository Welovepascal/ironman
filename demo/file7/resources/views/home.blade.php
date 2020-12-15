@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <!-- the variable $categories_list_for_home was loaded from the
                    TotalController@load_4_food_of_all_categories. It was set as an array in format
                    $category_name => $food_list ($food_list is an array, including all the
                    foods (variables "$food" below are Food instances) in a same named category -->
                @foreach ($categories_list_for_home as $category_name=>$food_list)
                    <a href="{{route('category.show',['category'=>$category_name] )}} ">
                        <div class="card-header">{{ $category_name }}</div>
                    </a>
                    <div class="card-body row text-center">
                        @foreach ($food_list as $food)
                            <div class="col-3 bg-light">
                                <a href="{{route('food.show',['food'=>$food['id']])}} ">
                                    <img src="{{url('/')}}/images/{{$food['img_link']}}"
                                            alt="{{$food['name']}}"  style="width: 100%; height: 145px">
                                </a>
                                <br>
                                <a href="{{route('food.show',['food'=>$food['id']])}} ">
                                    <h3>{{$food['name']}} </h3>
                                </a>
                                <br>
                                <div class="text-success">
                                    ${{$food['price']}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection
