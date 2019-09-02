<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Module;

class CourseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $courses = Course::all();
        $modules = Module::all();

        return view('admin.courses.index', compact('courses', 'modules'));
    }

    public function show($id)
    {
        $course = Course::find($id);
        return view('admin.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $corso = Course::find($id);
        $courses = Course::all();
        $modules = Module::where('course_id', $id)->get();
        return view('admin.courses.index', compact('corso', 'courses', 'modules'));
    }
    public function update(Request $request, $id)
    {

        $this->validateRequest();

        $course = Course::find($id);
        $course->nome = $request->get('nome');
        $course->descrizione = $request->get('descrizione');
        $course->costo = $request->get('costo');
        $course->esame = $request->get('esame');

        $course->save();

        $notification = array(
            'message' => 'Corso modificato con successo!',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Course::create($this->validateRequest());
        $notification = array(
            'message' => 'Corso inserito con successo!',
            'alert-type' => 'success'
        );
        $courses = Course::all();
        $modules = Module::all();

        return view('admin.courses.index', compact('courses', 'modules', 'notification'));
    }



    private function validateRequest()
    {

        return  request()->validate([
            'nome' => 'required|min:2',
            'costo' => 'required',
            'esame' => 'required',

        ]);
    }
    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();

        $notification = array(
            'message' => 'Corso Eliminato con successo!',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }
}
