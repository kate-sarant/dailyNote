<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Constraint\IsEmpty;
use Symfony\Component\Console\Input\Input;

class SearchController extends Controller
{
   
    public function index(){
    
    
            $q = request( 'q' );
            $notes = Note::whereBelongsTo(Auth::user())  
            ->where('text',"LIKE",'%'.$q.'%')
            ->orWhere('title',"LIKE",'%'.$q.'%')
            ->paginate(2);
            session('search','true');
         if($q == null|| $notes->isEmpty()){
            return to_route('notes.index')->with('message','Your searching bar was empty!');
             
        }
        else{
          
            return view('notes.index')->with('notes',$notes);          
        }    
        
   }

   public function trashed_search(){
     
    
    $q = request( 'q' );
    $notes = Note::whereBelongsTo(Auth::user())
     ->onlyTrashed() 
    ->where('text',"LIKE",'%'.$q.'%')
    ->orWhere('title',"LIKE",'%'.$q.'%')
    ->paginate(2);

 if($q == null|| $notes->isEmpty()){
    return to_route('trashed.index')->with('message','Your searching bar was empty!');
     
}
else{
   
   return view("notes.index")->with("notes",$notes);          
}    

}
    
}
