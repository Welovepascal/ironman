@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (isset($announce))
                <div class="alert-success">{{$announce}}</div>
            @endif
            <div class="card">
                <div class="card-header">List of all categories</div>
                <a href="{{route('category.create')}} " class="btn btn-dark">Create new category</a>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- $categories_list is an array including all categories
                                (which are Category instances) -->
                        @foreach ($categories_list as $k=>$category)
                            <tr>
                                <td> {{$category['id']}} </td>
                                <td>
                                    <a href="{{route('category.show',['category'=>$category['name']] )}} ">
                                        {{$category['name']}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('category.edit',['category'=>$category['id']] )}} "
                                                    class="btn btn-info">Edit</a>
                                </td>
                                <td>
                                    <a href="{{route('category.gotodelete',['id'=> $category['id']] ) }} "
                                        class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{route('category.create')}} " class="btn btn-dark">Create new category</a>
            </div>
        </div>
    </div>
</div>
@endsection
