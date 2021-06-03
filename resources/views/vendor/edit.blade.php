@extends('adminlte::page')
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a vendor</h1>

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
        <form method="post" action="{{ route('vendor.update', $vendor[0]->vendorId) }}">
            @csrf
            <div class="form-group">

                <label for="first_name">Name:</label>
                <input type="text" class="form-control" name="vendorName" value={{ $vendor[0]->vendorName }} />
            </div>

            <div class="form-group">
                <label for="last_name">Logo:</label>
                <input type="text" class="form-control" name="vendorLogo" value={{ $vendor[0]->vendorLogo }} />
            </div>

            <div class="form-group">
                <label for="email">Description:</label>
                <input type="text" class="form-control" name="vendorDescription" value={{ $vendor[0]->vendorDescription }} />
            </div>
            <div class="form-group">
                <label for="city">Email:</label>
                <input type="text" class="form-control" name="vendorEmail" value={{ $vendor[0]->vednorEmail }} />
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@stop