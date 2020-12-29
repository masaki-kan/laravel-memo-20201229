<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;
use Auth;
use App\Replaced\replacedText;

class memoController extends Controller
{
    //
    public function __construct(){
      return $this->middleware('auth');
    }
    public function index(){
      $topMemos = Memo::all();
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
    public function delete( $id ){
      Memo::where('id' , $id)->delete();
      return redirect(route('top'));
    }
    public function list( Request $request , $id){
      $lists = Memo::find($id);
      $introduction = replacedText::text($lists->content);

      return view( 'memo.show' )->with( ['lists' => $lists , 'introduction' => $introduction ] );
    }
}
