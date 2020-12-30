<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;
use Auth;
use App\Replaced\replacedText;
use Illuminate\Support\Facades\DB;


class memoController extends Controller
{
    //
    public function __construct(){
      return $this->middleware('auth');
    }
    public function index(){
      $topMemos = Memo::orderBy('created_at','asc')->get();//all();
      return view('memo.index', ['topMemos' => $topMemos ]);
    }
    public function register(){
      return view('auth.register');
    }

    public function create( Request $request){
      $memos = new Memo;
      $memos->user_id = Auth::user()->id;
      $memos->title = $request->title;
      $memos->content = $request->content;
      $memos->save();
      return redirect( route('top') );

    }
    public function update( Request $request){
      $memos = Memo::find( $request->id );
      $memos->user_id = Auth::user()->id;
      $memos->title = $request->title;
      $memos->content = $request->content;
      $memos->save();
      return redirect()->back();
    }
    public function search( Request $request){
      $key = $request->input('input');
      $values = Memo::where( 'content' , 'LIKE' , '%'.$key.'%')->get();
      return view( 'memo.search'  , [ 'values' => $values ]);
    }

    public function delete( $id ){
      Memo::where('id' , $id)->delete();
      return redirect(route('top'));
    }
    public function list( Request $request , $id){
      $lists = Memo::find($id);
      //content内にURLがあるとリンク設定する
      $introduction = replacedText::text($lists->content);

      return view( 'memo.show' )->with( ['lists' => $lists , 'introduction' => $introduction ] );
      //with()で引数を複数使う
    }
}
