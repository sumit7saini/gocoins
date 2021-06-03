@extends('adminlte::page')
@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<div class="containter">
	<h1>{{$user[0]->name}}</h1>
	<h3>{{$user[0]->userMobile}}</h3>
	<h5>{{$user[0]->email}}</h5>
	<form action="/add-coins" method="POST" role="addcoins">
		{{ csrf_field() }}
		<div class="input-group">
			<input type="hidden" id="custId" name="custId" value="{{$user[0]->id}}">
			<input type="number" class="form-control" name="q"
			placeholder="Add coins" required=""> <span class="input-group-btn">
				<button type="submit" class="btn btn-default">
					Add
				</button>
			</span>
		</div>
	</form>
</div>
@stop