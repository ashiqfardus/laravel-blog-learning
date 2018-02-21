@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <th>
                    Category Name
                </th>
                <th>
                    Edit
                </th>
                <th>
                    Delete
                </th>
                </thead>
                <tbody>
                    @if($categories->count()>0)
                        @foreach($categories as $category)
                            <tr>
                                <td>
                                    {{$category->name}}
                                </td>
                                <td>
                                    <a href="{{route('category.edit',['id'=>$category->id ])}}" class="btn btn-sm btn-info">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('category.delete',['id'=>$category->id ])}}" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    @else
                            <tr>
                                <th colspan="5" class="text-center">
                                    No Categories
                                </th>
                            </tr>

                        @endif
                </tbody>
            </table>
        </div>
    </div>
    @stop
