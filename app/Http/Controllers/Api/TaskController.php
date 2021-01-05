<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {

        // $tasks = Task::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(10);
        $tasks = auth()->user()->tasks;
       //dd($tasks);

        return response()->json([
            'success' => true,
            'data' => $tasks
        ]);
    }

    public function show($id)
    {
        $tasks = auth()->user()->tasks()->find($id);

        if (!$tasks) {
            return response()->json([
                'success' => false,
                'message' => 'Task not found '
            ], 400);
        }

        return response()->json([
            'success' => true,
            'data' => $tasks->toArray()
        ], 400);
    }

    public function store(Request $request)
    {
        
        $data = $request->all();

        $validator = Validator::make($data, [
            'note' => 'required|min:3',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'type' => 'Validation Error']);
        }

        $tasks = $request->user()->tasks()->create($request->only('note'));

        return response(['data' => $tasks->toArray(),'success' => true], 201);

    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'note' => 'required|min:3',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'type' => 'Validation Error']);
        }

        $tasks = auth()->user()->tasks()->find($id);

        if (!$tasks) {
            return response(['error' => $validator->errors(), 'type' => 'oops, something went wrong!']);
        }

        $tasks->update($request->all());

        return response(['data' => $tasks->toArray(), 'success' => true], 201);
    }

    public function destroy($id)
    {
        $tasks = auth()->user()->tasks()->find($id);

        if (!$tasks) {
            return response()->json([
                'success' => false,
                'message' => 'Task not found'
            ], 400);
        }

        if ($tasks->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Task deleted successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Task can not be deleted'
            ], 500);
        }
    }
}
