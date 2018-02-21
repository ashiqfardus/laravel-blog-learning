@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <th>
                    Image
                </th>
                <th>
                    Title
                </th>
                <th>
                    Edit
                </th>
                <th>
                    Restore
                </th>
                <th>
                    Delete
                </th>
                </thead>
                <tbody>
                    @if($posts->count()>0)
                        @foreach($posts as $post)
                            <tr>
                                <td>
                                    <img src="{{$post->featured}}" alt="{{$post->title}}" width="70px" height="55px">
                                </td>
                                <td>
                                    {{$post->title}}
                                </td>
                                <td>
                                    {{--<a href="{{route('post.edit',['id'=>$post->id ])}}" class="btn btn-sm btn-info">--}}
                                    {{--<i class="fas fa-pencil-alt"></i>--}}
                                    {{--</a>--}}
                                </td>
                                <td>
                                    <a href="{{route('post.restore',['id'=>$post->id ])}}" class="btn btn-sm btn-success">
                                        <i class="fas fa-undo"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('post.kill',['id'=>$post->id ])}}" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                        @else
                        <tr>
                            <th colspan="5" class="text-center">
                                No trashed Posts
                            </th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop