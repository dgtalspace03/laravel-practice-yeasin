<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\NoteController;
Route::get('/',[NoteController::class, "index"]);
Route::get('/about',function(){
    return view('about');
}); 
Route::get('/create',function(){
    return view('create');
});

Route::get('/edit/{id}',function($id){
     $note=DB::table('note')->Where('id',$id)->first();;
    if(!$note){
      abort(404);
    }
    return view('edit',compact('note'));
});
Route::post('/note/create',[NoteController::class, "create"]);
Route::delete('/note/delete/{id}',[NoteController::class, "delete"]);

Route::put('/note/edit/{id}',[NoteController::class, "edit"]);


Route::get('/admin',function(){
return 'Welcome Admin!';
})->middleware('admin');