
<!DOCTYPE html>
<html>
    <head>
        <title>toDoList</title>
        <link rel="stylesheet" href="{{ asset('/css/index.css') }}"> 
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="container">
            <h1>ToDoリスト</h1>
                <div class="filtering_radio">
                    <!-- jsファイルでラジオボタン押下で絞り込み -->
                    <label><input type="radio" id="all" name="select" value="all" checked>すべて</label>
                    <label><input type="radio" id="working" name="select" value="working">作業中</label>
                    <label><input type="radio" id="done" name="select" value="done">完了</label>
                </div>
            <div class="contents">
                <table id="table" class="table" border=1>
                    <tr><th>ID</th><th>コメント</th><th>状態</th></tr>
                    @foreach ($items as $item) 
                        <!-- 行ごとに状態をidに付与(JavaScriptで状態ごとに要素取得のため) -->
                        @if ($item->state === 0)
                            <tr id="working">
                        @else
                            <tr id="done">
                        @endif
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->comment}}</td>
                            <td>
                                <form class="working_state_Form" action="{{ url('todo/'.$item->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    @if ($item->state === 0)
                                        <button type="submit" class="state_btn" name="state" value="作業中">作業中</button>
                                        <input type="hidden" name='state' class="state" value="1">
                                    @else
                                        <button type="submit" class="state_btn" name="state" value="完了">完了</button>
                                        <input type="hidden" name='state' class="state" value="0">
                                    @endif
                                </form>
                                <form class="contents_Form" action="{{ url('todo/'.$item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete_btn" name="delete">削除</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="add_task">
                <h1>新規タスクの追加</h1>
                <form class="commentAdd_Form" action="todo" method="post">
                    @csrf
                    <input type='text' name='comment' class="comment" value="">
                    <button type="submit" class="add_btn">追加</button>
                </form>
            </div>
        </div>
    </body>
</html>