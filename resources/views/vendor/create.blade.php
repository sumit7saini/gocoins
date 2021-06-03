@extends('adminlte::page')
@section('content')
<div class="row">
	<div class="col-sm-8 offset-sm-2">
		<h1 class="display-3">Add a vednor</h1>
		<div>
			@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div><br />
			@endif
			<form method="post" action="{{ route('vendor.store') }}">
				@csrf
				<div class="form-group">    
					<label for="first_name">Name:</label>
					<input type="text" class="form-control" name="vendorName"/>
				</div>

				<div class="form-group">
					<label for="last_name">Logo:</label>
					<input type="text" class="form-control" name="vendorLogo"/>
				</div>

				<div class="form-group">
					<label for="email">Description:</label>
					<input type="text" class="form-control" name="vendorDescription"/>
				</div>
				<div class="form-group">
					<label for="city">Eamil:</label>
					<input type="text" class="form-control" name="vendorEmail"/>
				</div>                   
				<button type="submit" class="btn btn-primary-outline">Add Vendor</button>
			</form>
		</div>
	</div>
</div>
@stop