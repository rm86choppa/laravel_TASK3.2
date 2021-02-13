<?php
//ToDoリストコントローラへのルート
Route::resource('todo', 'TodoController', ['only' => ['index', 'store']]);
?>