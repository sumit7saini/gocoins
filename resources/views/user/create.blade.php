@extends('adminlte::page')
@section('content')
<div class="row">
	<div class="col-sm-8 offset-sm-2">
		<h1 class="display-3">Add a user</h1>
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
			<form method="post" action="{{ route('user.store') }}">
				@csrf
				<div class="form-group">    
					<label for="first_name">Name:</label>
					<input type="text" class="form-control" name="name"/>
				</div>

				<div class="form-group">
					<label for="last_name">Password:</label>
					<input type="text" class="form-control" name="password"/>
				</div>

				<div class="form-group">
					<label for="email">Role ID:</label>
					<input type="text" class="form-control" name="rollID"/>
				</div>
				
				<div class="form-group">
					<label for="city">Status:</label>
					<input type="text" class="form-control" name="userStatus"/>
				</div>

				<div class="form-group">
					<label for="last_name">Email:</label>
					<input type="text" class="form-control" name="email"/>
				</div>

				<div class="form-group">
					<label for="email">Mobile:</label>
					<input type="text" class="form-control" name="userMobile"/>
				</div>                 
				<button type="submit" class="btn btn-primary-outline">Add User</button>
			</form>
		</div>
	</div>
</div>
@stop