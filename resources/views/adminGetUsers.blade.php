@extends('adminlte::page')
@section('content')
<div class="container">
	<h1>Manage Users</h1>
	<form action="/search" method="GET" role="search">
		{{ csrf_field() }}
		<div class="input-group">
			<input type="text" class="form-control" name="q"
			placeholder="Search users"> <span class="input-group-btn">
				<button type="submit" class="btn btn-default">
					<i class="fas fa-search"></i>
				</button>
			</span>
		</div>
	</form>
	<table class="table table-bordered" style="width:100%">
		<thead>
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Profile</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($users as $user)
			<tr>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->userMobile }}</td>
				<td><a href="user/{{ $user->id }}">view</a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{{$users->links('pagination::bootstrap-4')}}
</div>
@stop