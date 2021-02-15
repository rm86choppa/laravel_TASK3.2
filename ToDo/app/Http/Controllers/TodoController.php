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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //DBにコメントを追加
        $item = $request->all();
        $toDo = ToDo::find($id);
        unset($item['_token']);
        unset($item['_method']);
        $toDo->fill($item)->save();

        return redirect('todo');
        
    }
}
