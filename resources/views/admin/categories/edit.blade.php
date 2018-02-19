@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header text-center">
            Update Category
        </div>
        <div class="card-body">
            <form action="{{route('category.update',['id'=>$category->id])}}" method="post">
                {{csrf_field()}}

                <div class="form-group">
                    <lavel for="name">Category Name</lavel>
                    <input type="text" name="name" class="form-control" value="{{$category->name}}">
                    </lavel>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @include('admin.include.errors')
@endsection
