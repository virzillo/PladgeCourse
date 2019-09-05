<?php

namespace App\Http\Controllers;

use App\Card;
use App\Course;
use App\Module;
use Illuminate\Http\Request;

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
        $cards = Card::all();

        return view('admin.courses.index', compact('courses', 'modules', 'cards'));
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
        $cards = Card::all();

        $modules = Module::where('course_id', $id)->get();
        return view('admin.courses.index', compact('corso', 'courses', 'modules', 'cards'));
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
        $this->validateRequest();

        // if ($request['tipo'] == 'online') {
        //     Course::create([
        //         'tipo' => $request['tipo'],
        //         'nome' => $request['nome'],
        //         'descrizione' => $request['descrizione'],
        //         'iscrizione' => $request['iscrizione'],
        //     ]);
        // } else {
        //     Course::create([
        //         'tipo' => $request['tipo'],
        //         'nome' => $request['nome'],
        //         'descrizione' => $request['descrizione'],
        //         'iscrizione' => $request['iscrizione'],
        //         'esami' => $request['esami'],
        //         'costo' => $request['costo'],
        //     ]);
        // }
        Course::create($request->all());


        $notification = array(
            'message' => 'Corso inserito con successo!',
            'alert-type' => 'success'
        );
        $courses = Course::all();
        $modules = Module::all();
        $cards = Card::all();


        return view('admin.courses.index', compact('courses', 'modules', 'notification', 'cards'));
    }



    private function validateRequest()
    {

        return  request()->validate([
            'nome' => 'required|min:2',
            'tipo' => 'required',
            'descrizione' => 'min:1',
            'costo' => '',
            'iscrizione' => '',
            'esami' => '',

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
