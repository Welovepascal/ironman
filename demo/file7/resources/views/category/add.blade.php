@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="/category" method="post">
                @csrf
                <div class="card text-center">
                    <div class="card-header">
                        <h4>Add new category</h4>
                    </div>
                    <div class="card-body form-group">
                        <label for="category_name">Category_name</label>
                        <input type="text" id='category_name' name='category_name' class="form-control"
                                                    placeholder="Set the category name here">
                    </div>
                    <input type="submit" value="SUBMIT">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
