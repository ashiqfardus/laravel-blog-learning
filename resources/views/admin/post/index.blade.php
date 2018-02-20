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
                    Trash
                </th>
                </thead>
                <tbody>
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
                                <a href="{{route('post.delete',['id'=>$post->id ])}}" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop