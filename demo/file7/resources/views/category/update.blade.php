@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if (!$category)
                <h2>There is nothing to update</h2>
            @else
                <form action="{{route('category.update',['category'=>$category['id']] )}} " method="post">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="card text-center">
                        <div class="card-header">
                            <h4>Update category which have id: {{$category['id']}} </h4>
                        </div>
                        <div class="card-body form-group">
                            <label for="category_name">Category_name</label>
                            <input type="text" id='category_name' name='category_name' class="form-control"
                                value="{{$category['name']}}" placeholder="Set the category name here">
                        </div>
                        <input type="submit" value="SUBMIT">
                    </div>
                </form>
            @endif

        </div>
    </div>
</div>
@endsection
