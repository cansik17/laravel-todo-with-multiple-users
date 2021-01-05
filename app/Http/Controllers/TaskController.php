<?php

namespace App\Http\Controllers;

use App\Models\Task;


use Illuminate\Http\Request;

use Illuminate\Pagination\LengthAwarePaginator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function __construct()
{
    $this->middleware('auth');
    
}
     
    public function index(Request $request)
    {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.index');
    }
        $tasks = Task::where('user_id', auth()->user()->id)->orderBy('id','desc')->paginate(10);
       // $tasks = Task::latest()->with(['users'])->paginate(10);
       // $tasks =Task::orderBy('id','desc')->get();
        
        
      // dd($tasks);
            
        return view('tasks', compact('tasks'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function search(Request $request)
    {
       $search = $request->get('search');
       $tasks = Task::where('user_id', auth()->user()->id)->orderBy('id', 'desc')
        ->where('note', 'like', '%' . $search . '%')
       ->paginate(5);
        $tasks->appends(['search' => $search]);

        return view('tasks', compact('tasks'));

    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'note' => 'required',

        ]);

        // Task::create([
        //     'note' => $request->note,
        //     'user_id' => auth()->user()->id,
        // ]);

        $request->user()->tasks()->create($request->only('note'));


        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tasks = auth()->user()->tasks()->find($id);

        if (!$tasks) {
            abort(404);
        }

        return view('edit', compact('tasks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'note' => 'required',

        ]);

        // Task::find($id)->update([
        //     'note' => $request->note,
        //     'user_id' => auth()->user()->id,
        // ]);
        $task = auth()->user()->tasks()->find($id);

        if (!$task) {
            abort(403);
        }

        $task->update($request->only('note'));


        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $tasks = auth()->user()->tasks()->find($id);

        if (!$tasks) {
            abort(403);
        }
        //dd($tasks);
        $tasks->delete();
        //toastr()->success('Silindi, seçili eylem başarıyla silinmiştir .');
        return redirect()->route('tasks.index');
    }
}
