@extends('adminlte::page')
@section('content')
<div class="row">
	<div class="col-sm-12">
		@if(session()->get('success'))
		<div class="alert alert-success">
			{{ session()->get('success') }}  
		</div>
		@endif
	</div>
	<div class="col-sm-12">
		<h1 class="display-3">User</h1>  
		<div>
			<a href="{{ route('user.create')}}" class="btn btn-primary">New user</a>
		</div>    
		<table class="table table-striped">
			<thead>
				<tr>
					<td>ID</td>
					<td>Name</td>
					<td>Email</td>
					<td>Mobile</td>
					<td colspan = 2>Actions</td>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
				<tr>
					<td>{{$user->id}}</td>
					<td>{{$user->name}}</td>
					<td>{{$user->email}}</td>
					<td>{{$user->userMobile}}</td>
					<td>
						<a href="{{ route('user.edit',$user->id)}}" class="btn btn-primary">View</a>
					</td>
					<td>
						<a href="{{ route('user.edit',$user->id)}}" class="btn btn-primary">Edit</a>
					</td>
					<td>
						<form action="{{ route('user.destroy', $user->id)}}" method="post">
							@csrf
							@method('DELETE')
							<button class="btn btn-danger" type="submit">Delete</button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	<div>
</div>
@stop