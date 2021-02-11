<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class ToDo extends Model
{
    //テーブル指定
    //(デフォルトでは、クラス名をテーブル名として検索するがテーブル名が異なるので明示的に指定が必要)
    protected $table = 'todolist';

    protected $fillable = ['comment', 'state'];

    protected $guarded = array('id');
}
