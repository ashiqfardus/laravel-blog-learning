@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header text-center">
            Create a new User
        </div>
        <div class="card-body">
            <form action="{{route('user.store')}}" method="post">
                {{csrf_field()}}

                <div class="form-group">
                    <lavel for="name">User</lavel>
                    <input type="text" name="name" class="form-control">
                    </lavel>
                </div>
                <div class="form-group">
                    <lavel for="name">Email</lavel>
                    <input type="email" name="email" class="form-control">
                    </lavel>
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
