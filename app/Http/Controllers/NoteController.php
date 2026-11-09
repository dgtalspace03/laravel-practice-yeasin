<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NoteController extends Controller
{
    public function index(Request $request)
    {

        $search = $request->query('search');
        $userId = Auth::id();
        if ($search) {

            $notes = Note::where('user_id', $userId)->where(function ($query) use ($search) {
                    $query->where("title", "like", "%{$search}%")->orWhere('content', 'like', "%{$search}%");
                })->get();
        } else {
            $notes = Note::where('user_id', $userId)->get();
        }

        return view('index', compact('notes', 'search'));
    }
    public function create(Request $request)
    {
        $request->validate([
            "title" => 'required|min:3|max:100|string',
            "content" => 'required|min:3|max:1000',
            "thumblain" => 'image|max:2024'
        ]);
        $title = $request->input('title');
        $content = $request->input('content');
        $path=null;
        if ($request->hasFile('thumblain')) {
            $file = $request->file('thumblain');
            $path = $file->store('thumblains', 'public');
        }

        $userId = Auth::id();

        Note::create([
            'title' => $title,
            'content' => $content,
            'user_id' => $userId,
            'thumblain' => $path
        ]);
        return redirect('/')->with('success', 'Note created successfully!');
    }
    public function edit(Request $request, $id)
    {
        $note=Note::findOrFail($id);
        $request->validate([
            "title" => 'required',
            "content" => 'required',
            "thumblain" => 'image|max:2024'
        ]);
        $title = $request->input('title');
        $content = $request->input('content');
        $file= null;
        $path=$note->thumblain;
        if($request->hasFile('thumblain')){
            $file=$request->file('thumblain');
            if($note->thumblain){
                Storage::disk('public')->delete($note->thumblain);
            }
           $path= $file->store('thumblains','public');
        }
        Note::where('id', $id)->update([
            'title' => $title,
            'content' => $content,
            'thumblain'=>$path

        ]);
        return redirect('/')->with('success', 'Note updated successfully!');
    }
    public function delete($id)
    {
        $note = Note::findOrFail($id);
        if($note->thumblain){
            Storage::disk('public')->delete($note->thumblain);
        }
        $note->delete();
        return redirect('/')->with('success', 'Note deleted successfully!');
    }
}
