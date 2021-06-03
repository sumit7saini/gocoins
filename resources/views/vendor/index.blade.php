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
		<h1 class="display-3">Vendor</h1>  
		<div>
			<a href="{{ route('vendor.create')}}" class="btn btn-primary">New vendor</a>
		</div>    
		<table class="table table-striped">
			<thead>
				<tr>
					<td>ID</td>
					<td>Name</td>
					<td>Logo</td>
					<td>Description</td>
					<td>Email</td>
					<td colspan = 2>Actions</td>
				</tr>
			</thead>
			<tbody>
				@foreach($vendors as $vendor)
				<tr>
					<td>{{$vendor->vendorId}}</td>
					<td>{{$vendor->vendorName}}</td>
					<td>{{$vendor->vendorLogo}}</td>
					<td>{{$vendor->vendorDescription}}</td>
					<td>{{$vendor->vendorEmail}}</td>
					<td>
						<a href="{{ route('vendor.edit',$vendor->vendorId)}}" class="btn btn-primary">Edit</a>
					</td>
					<td>
						<form action="{{ route('vendor.destroy', $vendor->vendorId)}}" method="post">
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