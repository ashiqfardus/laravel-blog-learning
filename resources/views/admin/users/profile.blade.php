@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header text-center">
            Edit Your profile
        </div>
        <div class="card-body">
            <form action="{{route('user.profile.update')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="form-group">
                    <lavel for="name">Full name</lavel>
                    <input type="text" name="name" class="form-control" value="{{$user->name}}">

                </div>
                <div class="form-group">
                    <lavel for="name">Email</lavel>
                    <input type="email" name="email" class="form-control"value="{{$user->email}}">

                </div>
                <div class="form-group">
                    <lavel for="name">New Password</lavel>
                    <input type="password" name="password" class="form-control">

                </div>
                <div class="form-group">
                    <lavel for="name">Upload Image For Profile</lavel>
                    <input type="file" name="avatar" class="form-control">

                </div>
                <div class="form-group">
                    <lavel for="name">Facebook Profile</lavel>
                    <input type="text" name="facebook" class="form-control" value="{{$user->profile->facebook}}">

                </div>
                <div class="form-group">
                    <lavel for="name">Youtube Profile</lavel>
                    <input type="text" name="youtube" class="form-control" value="{{$user->profile->youtube}}">
                </div>
                <div class="form-group">
                    <lavel for="name">About You</lavel>
                    <textarea type="text" name="about" id="about" cols="6" rows="6" class="form-control" > {{$user->profile->about}}</textarea>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" name="submit" class="btn btn-success">Submit</button>
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
