@extends('layouts.app')

@section('content')
<div class="alert alert-success" role="alert">
    <h4 class="alert-warning">WARNING</h4>
    <p>You are deleting the food {{$food['name']}} .
    <p class="mb-0">
        I just want to edit this Food instance.
        <a href="" class="btn btn-info">Go to the Edit page of {{$food['name']}} </a>
    </p>
    <p class="mb-0">
        I don't want to delete this food
        <a href="" class="btn btn-info">Go back to food list </a>
    </p>
    <p class="mb-8">
        I 'm sure I want to delete it!!
        <form action="{{route('food.destroy', ['food' => $food['id']]) }} " method="post">
            @csrf
            @method('DELETE')
            <input type="hidden" name="deleted_food_id" value="{{$food['id'] }} ">
            <input type="submit" value="Delete it" class="btn btn-dark">
        </form>
    </p>
</div>

@endsection
