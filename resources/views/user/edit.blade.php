@extends('adminlte::page')
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a User</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('user.update', $user[0]->id) }}">
            @csrf
            <div class="form-group">

                <label for="first_name">Name:</label>
                <input type="text" class="form-control" name="name" value={{ $user[0]->name }} />
            </div>

            <div class="form-group">
                <label for="last_name">Password:</label>
                <input type="text" class="form-control" name="password" value={{ $user[0]->password }} />
            </div>

            <div class="form-group">
                <label for="email">Role ID:</label>
                <input type="text" class="form-control" name="rollID" value={{ $user[0]->rollID }} />
            </div>
            <div class="form-group">
                <label for="city">Status:</label>
                <input type="text" class="form-control" name="userStatus" value={{ $user[0]->userStatus }} />
            </div>
            <div class="form-group">
                <label for="city">Email:</label>
                <input type="text" class="form-control" name="email" value={{ $user[0]->email }} />
            </div>
            <div class="form-group">
                <label for="city">Mobile:</label>
                <input type="text" class="form-control" name="userMobile" value={{ $user[0]->userMobile }} />
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@stop