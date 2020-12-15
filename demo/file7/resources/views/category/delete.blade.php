@extends('layouts.app')

@section('content')
<div class="alert alert-success" role="alert">
    <h4 class="alert-warning">WARNING</h4>
    <p class="alert-warning">You are deleting the category {{$category['name']}} . <br>
        All the Food instances of this Category will be delete too.</p>
    <p class="mb-0">
        <strong>I want to edit those Food instances. <br></strong>
        <a href="{{route('category.show',['category'=> $category['name']] )}} "
            class="btn btn-info">Go to the Foods list of category {{$category['name']}} </a>
    </p>
    <p class="mb-0">
        <strong>I just to edit the Categoy name. <br></strong>
        <a href="{{route('category.edit',['category'=> $category['id']] )}} "
                class="btn btn-info">Go to edit page of {{$category['name']}} </a>
    </p>

    <p class="mb-0">
        <strong>I don't want to delete this category <br></strong>
        <a href="{{route('category.index' )}}"
            class="btn btn-info">Go back to categories list </a>
    </p>
    <p class="mb-8">
        I 'm sure I want to delete it!!
        <form action="{{route('category.destroy', ["category" => $category['id']]) }} " method="post">
            @csrf
            @method('DELETE')
            <input type="hidden" name="deleted_category_id" value="{{$category['id'] }} ">
            <input type="submit" value="Delete it" class="btn btn-danger">
        </form>
    </p>
</div>

@endsection
