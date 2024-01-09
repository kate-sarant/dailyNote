<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrashedNoteController extends Controller
{
    public function index(){

        $count = Note::whereBelongsTo(Auth::user())->onlyTrashed()->count();
        $notes = Note::whereBelongsTo(Auth::user())->onlyTrashed()->latest('updated_at')->paginate(2);
  
        return view("notes.index",["count"=>$count])->with("notes",$notes);   
    }


    public function show(Note $note){
        if (!$note->user()->is(Auth::user())){
            return abort(403);
        } 
       
        return view("notes.show")->with("note",$note);   
           
    }
    
    public function update(Note $note){
        if (!$note->user()->is(Auth::user())){
            return abort(403);
        } 
        $note->restore();

        return to_route('notes.index')->with('success',"Note restored") ;
    }
    public function destroy(Note $note){
        if (!$note->user()->is(Auth::user())){
            return abort(403);
        } 
        $note->forceDelete();
        

        return to_route('trashed.index')->with('success',"Note deleted successfully") ;
    }
}
