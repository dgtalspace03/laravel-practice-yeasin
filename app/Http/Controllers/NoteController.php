<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class NoteController extends Controller
{
    public function index(Request $request){
      $search=$request->query('search');
    if($search){
         $notes= DB::table('note')->Where("title","like","%{$search}%")->orWhere('content','like',"%{$search}%")->get();
    }

    else{
        $notes= DB::table('note')->get();
    }

    return view('index',compact('notes','search'));
    }
    public function create(Request $request){
     $request->validate([
        "title"=> 'required|min:3|max:100|string',
        "content"=>'required|min:3|max:1000'
    ]);
    $title=$request->input('title');
    $content=$request->input('content');
    DB::table('note')->insert([
        "title"=>$title,
        "content"=>$content,
        'created_at' => now(),
        'updated_at' => now()
    ]);
    return redirect('/')->with('success', 'Note created successfully!');
    }
    public function edit(Request $request,$id){
    $request->validate([
        "title"=> 'required',
        "content"=>'required'
    ]);
    $title=$request->input('title');
    $content=$request->input('content');
    DB::table('note')
    ->Where('id',$id)
    ->update([
        "title"=>$title,
        "content"=>$content,
        'updated_at' => now()
    ]);
    return redirect('/')->with('success', 'Note updated successfully!');
    }
    public function delete($id){
         DB::table('note')
        ->Where('id',$id)
        ->delete();
    return redirect('/')->with('success', 'Note deleted successfully!');
    }
}
