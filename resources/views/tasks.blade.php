@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<a href="{{route('tasks.index')}}"><h3 class="btn btn-secondary">{{ Auth::user()->name }}'s todo list</h3></a>
		</div>
	</div>

<form action="{{route('tasks.store')}}" method="post">
    @csrf
		<div class="input-group mb-3 mt-3">
			<input type="text" class="form-control" name="note" placeholder="add something" aria-label="Recipient's username" aria-describedby="button-addon2">
			<div class="input-group-append">
				<button class="btn btn-outline-primary" type="submit" id="button-addon2">Add</button>
			</div>
		</div>
	</form>
	<hr>
	<form action="{{route('tasks.search')}}" method="get">
    @csrf
		<div class="input-group mb-3 mt-3 w-25 mx-auto">
			<input type="text" class="form-control " name="search" placeholder="Search area" aria-label="Recipient's username" aria-describedby="button-addon2">
			<div class="input-group-append">
				<button class="btn btn-outline-primary" type="submit" id="button-addon2">Search</button>
			</div>
		</div>
	</form>
	<hr>
	<br>
    <div class="container">
		{{ $tasks->links() }}
		<br>
<table class="table table-bordered table-striped">

				<tr>
					<th>Tasks</th>
					<th>Modified</th>
					<th>Update</th>
					<th>Delete</th>
				</tr>
				@foreach ($tasks as $task)
                    <tr>
							<td style="width: 80%">{{$task->note}} </td>
							<td style="width: 10%"> {{$task->updated_at}}</td>
							
							<td style="width: 5%">
								<a href="{{route('tasks.edit',$task->id)}}" class="btn btn-warning">Edit</button>
							</td>
							<td style="width: 5%">
                                 <form action="{{route('tasks.destroy',$task->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit"  title="Delete" class="btn btn-danger btn-sm float-right">Delete</button>
                                </form>
							</td>
						</tr>

						
                @endforeach

			</table>
			
    </div>

@endsection
