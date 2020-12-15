<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search =  $request->input('search');
        if ($search != "") {
            $tasks = Task::where(function ($query) use ($search) {
                $query->where('note', 'like', '%' . $search . '%');
            })
                ->orderBy('id', 'desc')->paginate(8);
            $tasks->appends(['search' => $search]);
        } else {
            $tasks = Task::orderBy('id','desc')->paginate(10);
        }
       
        
        $users = User::whereNotIn('id', ['6'])
                    ->get();;
        //dd($user);
        $filter = $request->input('filter');
      
        
        $filterTask = Task::where('user_id',$filter)->orderBy('id','desc')->paginate(10);
        $filterTask->appends(['filter' => $filter]);
        

        return view('admin', compact('tasks','users','filter','filterTask'));
        //
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
