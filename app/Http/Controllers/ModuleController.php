<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Module;
use App\Course;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $modules = Module::all();
        Module::create([
            'nome' => $request['nome'],
            'descrizione' => $request['descrizione'],
            'durata' => $request['durata'],
            'costo' => $request['costo'],
            'course_id' => $request['course_id']
        ]);
        $notification = array(
            'message' => 'Esame inserito con successo!',
            'alert-type' => 'success'
        );
        return back()->with($notification, $modules);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $corso = Course::find($id);
        $courses = Course::all();
        $modules = Module::where('course_id', $id)->get();
        return view('admin.courses.index', compact('corso', 'courses', 'modules'));
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
        $this->validateRequest();

        $module = Module::find($id);
        $module->nome = $request->get('nome');
        $module->descrizione = $request->get('descrizione');
        $module->importo = $request->get('importo');
        $module->durata = $request->get('durata');


        $module->save();

        $notification = array(
            'message' => 'Modulo esame modificato con successo!',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $module = Module::find($id);
        $module->delete();

        $notification = array(
            'message' => 'Esame Eliminato con successo!',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    private function validateRequest()
    {

        return  request()->validate([
            'nome' => 'required|min:2',
            'descrizione' => 'required|min:2',
            'importo' => 'required',
            'durata' => 'required',
        ]);
    }
}
