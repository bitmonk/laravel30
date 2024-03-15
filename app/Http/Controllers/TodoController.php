<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
        if($request->hasFile('image')){
            $image = $request->file('image');
            $newImage = $image->hashName();
            $image->move("image", $newImage);
            $todo->image = "image/$newImage";
            
        }
        // return $todo;
        $todo->save();
        toast('Task Added Successfully !', 'success');
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
        toast('Task Deleted Successfully !','error');

        return redirect()->back();
    }

    public function statusComplete($id){
        $status = Todo::FindOrFail($id);
        $status->status = 1;
        $status->save();
        toast('Status Changed !','success');

        return redirect()->back();
        
    }

    public function statusIncomplete($id){
        $status = Todo::FindOrFail($id);
        $status->status = 0;
        $status->save();
        toast('Status Changed !','success');

        return redirect()->back();
    }

}
