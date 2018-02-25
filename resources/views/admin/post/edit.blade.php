@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header text-center">
            Edit post
        </div>
        <div class="card-body">
            <form action="{{route('post.update',['id'=>$post->id])}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="form-group">
                    <lavel for="title">Title</lavel>
                    <input type="text" name="title" class="form-control" value="{{$post->title}}">
                </div>
                <div class="form-group">
                    <lavel for="title">Featured Image</lavel>
                    <input type="file" name="featured" class="form-control">
                </div>
                <div class="form-group">
                    <lavel for="title">Select Category</lavel>

                    <select name="category_id" id="category" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"
                            @if($post->category_id==$category->id)
                                SELECTED
                                @endif
                            >{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <lavel for="title">Select Tags</lavel>
                    @foreach($tags as $tag)
                        <div class="checkbox">
                            <lavel><input type="checkbox" name="tags[]" value="{{$tag->id}}"
                                @foreach($post->tags as $t)
                                    @if($tag->id==$t->id)
                                        checked
                                    @endif
                                @endforeach
                                >{{$tag->tag}}</lavel>
                        </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <lavel for="title">Content</lavel>
                    <textarea id="summernote" cols="5" rows="5" type="text" name="content" class="form-control"> {{$post->content}}</textarea>

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
@section('styles')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
@stop

@section('scripts')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
@stop