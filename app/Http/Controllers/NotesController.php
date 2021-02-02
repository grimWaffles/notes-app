<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::User()){
            
            $notes=DB::table('notes')->where('user_id','=',Auth::user()->id)->orderBy('updated_at','desc')->get();

            return view('notes.index')->with('notes',$notes);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $note=new Notes();
        //get inputs from the page
        $note->body=$request->input('body');
        $note->title=$request->input('title');
        $note->user_id=Auth::user()->id;

        //store in db  
        $note->save();

        //return a view
        return redirect('/notes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()){

            $note=Notes::find($id);

            if($note->user_id === Auth::user()->id){
                return view('notes.edit')->with('note',$note);
            }
            else{
                return redirect('notes.index');
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth::user()){
            
            $note=Notes::find($id);

            $note->title=$request->input('title');
            $note->body=$request->input('body');

            $note->update();

            return redirect('/notes');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       if(Auth::user()){
        
            $note=Notes::find($id);

            $note->delete();

            return redirect('/notes');
       }
    }
}
