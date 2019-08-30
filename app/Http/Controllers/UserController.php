<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('admin.users.index', compact('users', 'roles'));
        //
    }


    public function getcompanies()
    {



        if (request()->ajax()) {
            return datatables()->of(Company::latest()->get())
                ->addColumn('action', function ($dsata) {
                    $button = '<button type="button" name="edit" id="' . $dsata->id . '" class="edit btn btn-primary btn-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="' . $dsata->id . '" class="delete btn btn-danger btn-sm">Delete</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
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

        $data = $this->validateRequest();

        if (!empty($request->input('password'))) {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($request->input('password')),
            ]);
        } else {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
            ]);
        }


        $notification = array(
            'message' => 'Utente creato con successo!',
            'alert-type' => 'success'
        );
        $role = $request->input('role');
        $ruolodaassegnare = Role::where('id', $role)->get()->first();

        // $utente = DB::table('users')->latest()->first();

        $user->roles()->attach($ruolodaassegnare);
        return back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.users.show', compact('user', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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


        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->save();
        $ruolo = $request->get('role');
        $user
            ->roles()
            ->sync(Role::where('id', $ruolo)->first());
        $notification = array(
            'message' => 'Utente modificato con successo!',
            'alert-type' => 'info'
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
        $user = User::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Utente Eliminato con successo!',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    private function validateRequest()
    {

        return  request()->validate([
            'name' => 'required|min:2',
            'email' => 'required|email',
            'password' => 'required',
        ]);
    }
}
