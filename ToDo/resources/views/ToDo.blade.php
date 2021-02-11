
<!DOCTYPE html>
<html>
    <head>
        <title>toDoList</title>
        <link rel="stylesheet" href="{{ asset('/css/index.css') }}">   
    </head>
    <body>
        <div class="container">
            <h1>ToDoリスト</h1>
                <div class="filtering_radio">
                    <label>
                        <input type="radio" name="state" value="all" onclick="radio_click('all')" checked>
                            すべて
                        <button id="all" type="radio" class="all_btn" name="state">
                            <input type="hidden" name='state' class="id" value="すべて">
                        </button>
                    </label>
                    <label>
                        <input type="radio" name="state" value="作業中"  onclick="radio_click('working')" >作業中
                        <button id="working" type="radio" class="working_btn" name="state">
                        <input type="hidden" name='state' class="id" value="作業中">
                        </button>
                    </label>
                    <label>
                        <input type="radio" name="state" value="完了">完了
                        <button id="done" type="radio" class="done_btn" name="state">
                            <input type="hidden" name='state' class="id" value="完了">
                        </button>
                    </label>
                </div>
            <div class="contents">
                <table class="table" border=1>
                    <tr><th>ID</th><th>コメント</th><th>状態</th></tr>
                    @foreach ($items as $item) 
                        <tr>
                            <td>{{$loop->iteration}}</td><td>{{$item->comment}}</td>
                            <td>
                                <input type="hidden" name='id' class="id" value={{$loop->iteration}}>
                                <input type="hidden" name='state' class="state" value="">
                                <input type="hidden" name='comment' class="comment" value={{$item->comment}} >
                                <button type="submit" class="state_btn" name="state" value={{$item->state}} >{{$item->state}} <p hidden>@method('patch')</p></button>
                                <input type="hidden" name='id' class="id" value={{$item->id}}>
                                <button type="submit" class="delete_btn" name="delete" value="">削除</button>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="add_task">
                <h1>新規タスクの追加</h1>
                <form class="commentAdd_Form" action="" method="post">
                    @csrf
                    <input type='text' name='comment' class="comment" value="">
                    <input type="hidden" name='state' class="state" value="作業中">
                    <button type="submit" class="add_btn">追加</button>
                </form>
            </div>
        </div>
    </body>
</html>