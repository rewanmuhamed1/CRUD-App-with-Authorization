<?php

namespace App\Http\Controllers;

use App\ClassStudent;
use Illuminate\Http\Request;

class ClassStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes=ClassStudent::all();
        return view('class.index',['classes'=>$classes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('class.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        ['title'=>'required|min:3']
    );
  //  dd($request->all());
  ClassStudent::create([
        'title'=>$request->title
    ]);
    return redirect()->back()->with('status','Class Added Successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClassStudent  $classStudent
     * @return \Illuminate\Http\Response
     */
    public function show(ClassStudent $classStudent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClassStudent  $classStudent
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
       // dd($id);
        $classStudent=ClassStudent::find($id);
        // dd($department);
        return view('class.edit',['classStudent'=>$classStudent]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClassStudent  $classStudent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,
        ['title'=>'required|min:3']
    );
    //dd($department->id);
    $clas=ClassStudent::find( $id);
    $clas->title=$request->title;
    //dd($dept->title);
    $clas->save();
    return redirect()->back()->with('status','Class Updated Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClassStudent  $classStudent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clas=ClassStudent::find( $id);
        $clas->delete();
        return redirect()->back()->with('status','Class Deleted Successfuly'); 
    }
}
