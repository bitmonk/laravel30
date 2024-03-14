<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    public function todo()
    {
        $todos = Todo::all();
        // return $todos;
        return view('Page.Todo.todo', compact('todos'));
    }

    
    public function addTodo(Request $request)
    {

        $todo = new Todo();
        $todo->task = $request->blabla;
        $todo->save();
        return redirect()->back();
    }

    public function edit($id)
    {

        $user = Todo::FindOrFail($id);
        return view('Page.Todo.edit', compact('user'));
    }

    public function update(Request $request, $id){
        $todoUpdate = Todo::FindOrFail($id);
        $todoUpdate->task = $request->task;
        $todoUpdate->update();

        return redirect()->back();
    }

    public function delete($id){
        $todoDelete = Todo::FindOrFail($id);
        $todoDelete->delete();

        return redirect()->back();
    }

    public function status($id){
        $status = Todo::FindOrFail($id);
        $status->status = 1;
        $status->save();

        return redirect()->back();
        
    }

}
