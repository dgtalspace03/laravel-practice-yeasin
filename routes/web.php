<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
Route::get('/', function (Request $request) {

    $search=$request->query('search');
    if($search){
         $notes= DB::table('note')->Where("title","like","%{$search}%")->orWhere('content','like',"%{$search}%")->get();
    }

    else{
        $notes= DB::table('note')->get();
    }

    return view('index',compact('notes','search'));
});
Route::get('/about',function(){
    return view('about');
}); 
Route::get('/create',function(){
    return view('create');
});


Route::post('/note/create',function(Request $request){
    $request->validate([
        "title"=> 'required',
        "content"=>'required'
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
});