<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Notebook;
use Illuminate\Http\Request;
use Image;

class NotebooksController extends Controller
{
    public function index()
    {
        $user=Auth::user();
        $notebooks= $user->notebooks;
        return view('notebooks.index',compact('notebooks'));
    }

    public function create()
    {
        return view('notebooks.create');
    }
    public function store(Request $request){
        $user=Auth::user();
        $notebook= $user->notebooks()->create($request->all());
        if($request->hasFile('avatar')){
            $avatar=$request->file('avatar');
            $time=time();
            $filename=$time.'.'.$avatar->getClientOriginalExtension();
            $copy=$time.'copy.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(251,201)->insert(public_path('/image/watermark.png'),'bottom-right',10,10)->save(public_path('/dist/img/'. $filename));
            Image::make($avatar)->resize(251,201)->pixelate()->insert(public_path('/image/watermark.png'),'bottom-right',10,10)->save(public_path('/dist/img/'. $copy));
            $notebook->avatar=$filename;
            $notebook->avatarcopy=$copy;
            $notebook->save();
        }
        return redirect()->route('notebooks.index');
    }
    public function show($id)
    {

        $notebook = Notebook::where('id', $id)->first();
        if(Gate::allows('show-post',$notebook)) {
            $notes = $notebook->notes;
            return view('notes.index', compact('notes', 'notebook'));
        }
        else{return view('errorpage');}
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notebook=Notebook::where('id',$id)->first();
        if(Gate::allows('show-post',$notebook))
        {
            return view('notebooks.edit',compact('notebook'));
        }
        else{return view('errorpage');}


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
        $notebook=Notebook::where('id',$id)->first();
        $notebook->update($request->all());
        if($request->hasFile('avatar')){
            $avatar=$request->file('avatar');
            $time=time();
            $filename=$time.'.'.$avatar->getClientOriginalExtension();
            $copy=$time.'copy.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(251,201)->insert(public_path('/image/watermark.png'),'bottom-right',10,10)->save(public_path('/dist/img/'. $filename));
            Image::make($avatar)->resize(251,201)->pixelate()->insert(public_path('/image/watermark.png'),'bottom-right',10,10)->save(public_path('/dist/img/'. $copy));
            $notebook->avatar=$filename;
            $notebook->avatarcopy=$copy;
            $notebook->save();
        }
        return redirect('/notebooks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notebook=Notebook::where('id',$id)->first();
        $notebook->delete();
        return back();
    }
}
