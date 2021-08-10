<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\User;

use Carbon\Carbon;

class TodoController extends Controller
{
    public function new_todo(){
        return view('pages.new_todo');
   }
    public function confirm_new_todo(Request $request){
        $validated_data = $request->validate([
            'title' => 'required',
            'description' => 'required|max:150',
            'level' => 'required',
            // 'status' => 'required',
            // 'deadline' => 'required',
        ]);

        // return dd($request);

        $todo = new Todo;
        $todo->title =$request->input('title');
        $todo->user_id = session('id');
        $todo->description = $request->input('description');
        $todo->level =$request->input('level');
        $todo->status = env('DEFAULT_TODO_STATUS') ;
        // $todo->deadline =$request->input('deadline');
        // $todo->deadline =0;

        $todo->deadline = Carbon::now();
        $todo->save();

        $message = "You have successfully created  new discussion";
        
        return redirect('/dashboard')->with('success', $message);
    }
public function dashboard(){
    // $todos = Todo::all();


    $todos = Todo::where('user_id', session('id'))->get();
    // return dd($todos);

    return view('pages.dashboard', compact('todos'));
}

public function delete($id){
    $data = Todo::find($id);
    // return dd($data);
    $delete = $data->delete();
    return redirect('/dashboard');
    
}

public function complete($id){
    // return dd($id);
     $data = Todo::find($id); 
    $status = $data ->status;
   if ($status == 0) {
    $todo = Todo::find($id)->update([
        'status' => 1
        ]);
   
   }
   else{
    $todo = Todo::find($id)->update([
        'status' => 0
        ]);
}  
    return redirect('/dashboard');
    
}

}
