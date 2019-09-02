<?php

namespace App\Http\Controllers;

use Validator;
use App\Module;
use App\Company;
use App\Customer;
use Illuminate\Http\Request;

class AjaxCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {


            $data = Customer::latest()->get();
            $button = '<button type="button" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm">Edit</button>';
            $button .= '&nbsp;&nbsp;';
            $button .= '<button type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm">Delete</button>';
            $testo = $data->company->name;
            return response()->json(['data' => $data, 'button' => $button, 'testo' => $testo]);
        }
        $companies = Company::all();
        return view('home', compact('companies'));
    }

    public function getcompanies($course_id)
    {

        // Fetch all records
        $userData['data'] = Modules::getuserData($course_id);

        echo json_encode($userData);
        exit;

        // if (request()->ajax()) {
        //     $modules = Modules::find($course_id)->get;
        //     return response()->json(['modules' => $modules]);
        // }
    }
    public function fetchCompany($id)
    {
        // $modules = Modules::all();

        $data = Module::where('course_id', $id)->get();
        $button = "";
        foreach ($data as $dato) {
            // $button = $dato->nome 
            $button .= '<option value="' . $dato->nome . '">' . $dato->nome  . '</option>';
        }
        return response()->json(['data' => $data, 'button' => $button]);
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
        // $rules = array(
        //     'name'    =>  'required',
        //     'email'     =>  'required',
        //     'type'     =>  'required',
        //     'active'     =>  'required',
        //     'company_id'     =>  'required',


        //     // 'image'         =>  'required|image|max:2048'
        // );

        // $error = Validator::make($request->all(), $rules);

        // if($error->fails())
        // {
        //     return response()->json(['errors' => $error->errors()->all()]);
        // }

        // // $image = $request->file('image');

        // // $new_name = rand() . '.' . $image->getClientOriginalExtension();

        // // $image->move(public_path('images'), $new_name);

        // $form_data = array(
        //     'name'        =>  $request->name,
        //     'email'         =>  $request->email,
        //     'type'         =>  $request->type,
        //     'active'         =>  $request->active,
        //     'company_id'         =>  $request->company_id,

        //     // 'image'             =>  $new_name
        // );

        // Customer::create($form_data);

        // return response()->json(['success' => 'Data Added successfully.']);

        Customer::create($this->validateRequest());

        return response()->json(['success' => 'Data Added successfully.']);
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
        if (request()->ajax()) {
            $data = Customer::findOrFail($id);
            return response()->json(['data' => $data]);
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
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if ($image != '') {
            $rules = array(
                'name'    =>  'required',
                'email'     =>  'required',
                'type'     =>  'required',
                'active'     =>  'required',
                'company_id'     =>  'required',
            );
            $error = Validator::make($request->all(), $rules);
            if ($error->fails()) {
                return response()->json(['errors' => $error->errors()->all()]);
            }

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        } else {
            $rules = array(
                'first_name'    =>  'required',
                'last_name'     =>  'required'
            );

            $error = Validator::make($request->all(), $rules);

            if ($error->fails()) {
                return response()->json(['errors' => $error->errors()->all()]);
            }
        }

        $form_data = array(
            'first_name'       =>   $request->first_name,
            'last_name'        =>   $request->last_name,
            'image'            =>   $image_name
        );
        Customer::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Data is successfully updated']);


        $request->update($this->validateRequest());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Customer::findOrFail($id);
        $data->delete();
    }

    private function validateRequest()
    {

        return  request()->validate([
            'name' => 'required|min:2',
            'email' => 'required|email',
            'active' => 'required',
            'type' => 'required',
            'company_id' => 'required'
        ]);
    }
}
