@extends('layouts.app')

@section('content')

<div class="container">
    <form action="{{route('tasks.update', $tasks->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
                <label for="formGroupExampleInput2">Note:</label>
        <input type="text" class="form-control" value="{{$tasks->note}}" name="note" id="formGroupExampleInput2">
        </div>
        <button class="btn btn-primary" type="submit">Update</button>

    </form>
</div>
@endsection
