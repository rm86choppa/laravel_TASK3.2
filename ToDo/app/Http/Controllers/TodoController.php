<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ToDo;
use Illuminate\Http\RedirectResponse;

class TodoController extends Controller
{
   /**
     * ToDoリスト表示
     */
    public function index()
    {
        $items = ToDo::all();
        
        return view('todo', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //DBにコメントを追加
        $todo = new ToDo;
        $items = $request->all();
        unset($items['_token']);
        $todo->fill($items)->save();

        return redirect('todo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ToDo::find($id)->delete();

        return redirect('todo');
    }
}
