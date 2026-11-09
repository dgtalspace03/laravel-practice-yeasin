<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\NoteController;
use App\Models\Note;

Route::get('/',[NoteController::class, "index"])->middleware('auth');
Route::get('/about',function(){
    return view('about');
}); 
Route::get('/create',function(){
    return view('create');
});

Route::get('/edit/{id}',function($id){
     $note=Note::find($id);
    if(!$note){
      abort(404);
    }
    return view('edit',compact('note'));
});
Route::post('/note/create',[NoteController::class, "create"]);

Route::delete('/note/delete/{id}',[NoteController::class, "delete"]);

Route::put('/note/edit/{id}',[NoteController::class, "edit"]);

Auth::routes();




Route::get('/admin',function(){
return 'Welcome Admin!';
})->middleware(['auth','admin']);