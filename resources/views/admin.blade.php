@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<a href="{{route('admin.index')}}"><h3 class="btn btn-secondary">{{ Auth::user()->name }}'s admin panel</h3></a>
		</div>
	</div>


	<hr>
	<form action="{{route('admin.index')}}" method="get">
    @csrf
		<div class="input-group mb-3 mt-3 w-25 mx-auto">
			<input type="text" class="form-control " name="search" placeholder="Search within all tasks" aria-label="Recipient's username" aria-describedby="button-addon2">
			<div class="input-group-append">
				<button class="btn btn-outline-primary" type="submit" id="button-addon2">Search</button>
			</div>
		</div>
	</form>
	<hr>
	<br>
	<form action="{{route('admin.index')}}" method="get">
		<div class="input-group w-25 mx-auto">
		<select class="custom-select" name="filter" id="inputGroupSelect04" aria-label="Example select with button addon">
			<option selected value="">Choose an User</option>
			@foreach ($users as $user)
				<option value="{{$user->id}}">{{$user->email}}</option>
			@endforeach
			
		</select>
		<div class="input-group-append">
			<button class="btn btn-outline-secondary" type="submit">Filter</button>
		</div>
		</div>
	</form>
	<br>
@if ($filter !="")
	<div class="container">
		{{ $filterTask->links() }}
		<br>
<table class="table table-bordered table-striped">

				<tr>
					<th>Tasks</th>
					<th>User</th>
					<th>Modified</th>
					
				</tr>

				@foreach ($filterTask as $row)
				@php
					$note=$row->note;
					$id=$row->user_id;
					$date=$row->updated_at;

				@endphp

                    	<tr>
							<td style="width: 75%">{{$note}} </td>
							<td style="width: 15%">{{$id}} </td>
							<td style="width: 10%"> {{$date}}</td>

						</tr>

                @endforeach

			</table>
			
</div>
@else
	<div class="container">
		{{ $tasks->links() }}
		<br>
<table class="table table-bordered table-striped">

				<tr>
					<th>Tasks</th>
					<th>User</th>
					<th>Modified</th>
					
				</tr>

				@foreach ($tasks as $task)
				@php
					$note=$task->note;
					$id=$task->user_id;
					$date=$task->updated_at;

				@endphp

                    	<tr>
							<td style="width: 75%">{{$note}} </td>
							<td style="width: 15%">{{$id}} </td>
							<td style="width: 10%"> {{$date}}</td>

						</tr>

                @endforeach

			</table>
			
</div>
@endif


@endsection
