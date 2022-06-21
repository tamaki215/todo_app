<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;


class TodoController extends Controller
{
    public function index(){
        $todos = Todo::orderBy('created_at','desc')->get();

        return view('todolist',['todos' => $todos]);
    }

    //addメソッドの追加
    public function add(Request $request){
        $request->validate([
            'content' => 'required|min:3|max:100'
        ]);

        Todo::create([
            'content' => $request->content
        ]);
        return redirect()->route('todo.init');
    }

    public function check(Request $request) {
        $todo = Todo::find($request->select_todo_id);

        if ($todo->check) {
            $todo->check = false;
        } else {
            $todo->check = true;
        }

        $todo->save();
        
        //初期表示画面へのリダイレクト
        return redirect()->route('todo.init');
    }

    public function delete(Request $request){
        Todo::find($request->select_todo_id)->delete();
        return redirect()->route('todo.init');
    }
}
