@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
            @if (isset($announce))
                <div class="alert-success">{{$announce}}</div>
            @endif
                <h1 class="mt-2"> List all Foods </h1>
                <a href="{{route('food.create')}} " class="btn btn-dark">Add new food</a>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Food Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Category</th>
                        <th scope="col">Detail</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>

                        <!-- $food_list is an array including all foods, Food instance whose properties
                            can be accessed in array way (They can also be accessed in StdClass instance way)-->
                        @foreach ($food_list as $k=>$food)
                            <tr>
                                <td>
                                    <img src="{{url('/')}}/images/{{$food['img_link']}}"
                                        alt="{{$food['name']}}" style="width: 60%; height: auto">
                                </td>
                                <td>
                                    {{$food['name']}}
                                </td>
                                <td> {{$food['price']}} </td>
                                <td>
                                    <a href="{{route('category.show',['category'=>$food['category_name']] )}} ">
                                        {{$food['category_name']}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('food.show',['food'=>$food['id']])}} "
                                                            class="btn btn-primary">Detail</a>
                                </td>
                                <td>
                                    <a href="{{route('food.edit',['food'=>$food['id']] )}}"
                                                                 class="btn btn-info">Edit</a>
                                </td>
                                <td>
                                    <a href="{{route('food.gotodelete', ['id' => $food['id']] ) }} "
                                        class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{route('food.create')}} " class="btn btn-dark">Add new food</a>
            </div>
        </div>
    </div>
</div>
@endsection
