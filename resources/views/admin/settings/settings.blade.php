@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header text-center">
            Edit Blog Settings
        </div>
        <div class="card-body">
            <form action="{{route('settings.update')}}" method="post">
                {{csrf_field()}}

                <div class="form-group">
                    <lavel for="name">Site Name</lavel>
                    <input type="text" name="site_name" class="form-control" value="{{$settings->site_name}}">
                </div>
                <div class="form-group">
                    <lavel for="name">Contact Number</lavel>
                    <input type="text" name="contact_number" class="form-control" value="{{$settings->contact_number}}">
                </div>
                <div class="form-group">
                    <lavel for="name">Contact Email</lavel>
                    <input type="email" name="contact_email" class="form-control" value="{{$settings->contact_email}}">
                </div>
                <div class="form-group">
                    <lavel for="name">Address</lavel>
                    <input type="text" name="address" class="form-control" value="{{$settings->address}}">
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
