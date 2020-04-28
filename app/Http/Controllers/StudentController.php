<?php

namespace App\Http\Controllers;
use DB;
use App\Student;
use App\Department;
use App\ClassStudent;
use App\User;
use Illuminate\Http\Request;
use Crypt;
class StudentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students=Student::all();
        return view('student.index',['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments=Department::all();
        $classes=ClassStudent::all();
        return view('student.create',['departments'=>$departments,'classes'=>$classes]);

    }

       function createRandom()
    {

     do
     {
        $reg_id='stud_'.mt_rand();
        $exists= Student::where('reg_id', '=',$reg_id )->exists();

     }
     while($exists);

     return $reg_id;

        //$exists = DB::table('students')->where('reg_id','stud_'.mt_rand() )->first();
        //dd($exists);

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
            ['name'=>'required',
            'father_name'=>'required',
            'mother_name'=>'required',
            'presdent_address'=>'required',
            'permanent_address'=>'required',
            'phone_number'=>'required',
            'home_number'=>'required',
            'email'=>'required',
            'classes'=>'required',
            'roll'=>'required',
            'department'=>'required'
            ]
        );
    //  dd($request->all());
    $reg_num=$this->createRandom();
   //  dd($reg_num);
    User::create(
        ['name'=>$request->name,
        'email'=>$request->email,
        'password' =>bcrypt($reg_num),//Crypt::encrypt(str_random(8)), //bcrypt(str_random(8)),
        'role_id' => 3,
        'reg_id_all'=>$reg_num,
        ]);

    Student::create([
        'name'=>$request->name,
        'father_name'=>$request->father_name,
        'mother_Name'=> $request->mother_name,
        'presdent_address'=>$request->presdent_address,
        'permanent_address'=>$request->permanent_address,
        'phone_number'=>$request->phone_number,
        'home_number'=>$request->home_number,
        'email'=>$request->email,
        'classes_id'=>$request->classes,
        'department_id'=>$request->department,
        'roll'=>$request->roll,
        'reg_id'=>$reg_num,

        ]);


        
        return redirect()->back()->with('status','Student Added Successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $departments=Department::all();
        $classes=ClassStudent::all();
        //dd($student);
        $student=Student::find($student->id);
       // dd($student);
        return view('student.edit',['student'=>$student,'departments'=>$departments,'classes'=>$classes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $this->validate($request,
        ['name'=>'required',
        'father_name'=>'required',
        'mother_name'=>'required',
        'presdent_address'=>'required',
        'permanent_address'=>'required',
        'phone_number'=>'required',
        'home_number'=>'required',
        'email'=>'required',
        'classes'=>'required',
        'roll'=>'required',
        'reg_id'=>'required',
        'department'=>'required'
        ]
    );
    //dd($student->id);
    $stud=Student::find($student->id);

    $stud->name=$request->name;
    $stud->father_name=$request->father_name;
    $stud->mother_Name= $request->mother_name;
    $stud->presdent_address=$request->presdent_address;
    $stud->permanent_address=$request->permanent_address;
    $stud->phone_number=$request->phone_number;
    $stud->home_number=$request->home_number;
    $stud->email=$request->email;
    $stud->classes_id=$request->classes;
    $stud->department_id=$request->department;
    $stud->roll=$request->roll;
    $stud->reg_id=$request->reg_id;
    $stud->save();
    //dd($request->all());
    //$stud->update($request->all());
    return redirect()->back()->with('status','Student Updated Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->back()->with('status','Student Deleted Successfuly');
    }
}
