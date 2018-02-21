@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header text-center">
            Edit Tag
        </div>
        <div class="card-body">
            <form action="{{route('tag.update',['id'=>$tag->id])}}" method="post">
                {{csrf_field()}}

                <div class="form-group">
                    <lavel for="name">Tag Name</lavel>
                    <input type="text" name="tag" class="form-control" value="{{$tag->tag}}">
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

    @if(count($errors)> 0 )
        <ul class="list-group">
            @foreach($errors ->all() as $error)
                <li class="list-group-item text-danger">
                    {{$error}}
                </li>
            @endforeach
        </ul>
    @endif
@endsection
