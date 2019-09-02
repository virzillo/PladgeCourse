<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use DB;
use Auth;

class TransactionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::all();
        $in = Transaction::where('tipo', 'in')->get();
        $out = Transaction::where('tipo', 'out')->get();
        $totIn  = DB::table('transactions')->where('tipo', 'in')->sum('cifra');
        $totOut  = DB::table('transactions')->where('tipo', 'out')->sum('cifra');

        // dd($totIn);
        return view('admin.spese.index', compact('transactions', 'in', 'out', 'totIn', 'totOut'));
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
        $data = request()->validate([
            'nome' => 'required|max:255',
            'descrizione' => 'required',
            'cifra' => 'required',
            'tipo' => 'required',
            'ricorrente' => 'min:0',

        ]);
        if (!isset($data['ricorrente'])) {
            $data['ricorrente'] = '0';
        } else {
            $data['ricorrente'] = '1';
        }

        $tipo = $request['tipo'];
        Transaction::create([
            'nome' => $data['nome'],
            'descrizione' => $data['descrizione'],
            'cifra' => $data['cifra'],
            'tipo' => $request['tipo'],
            'ricorrente' => $data['ricorrente'],

            'operatore' => Auth::user()->id,

        ]);

        $notification = array(
            'message' => 'Inserimento avvenuto con successo!',
            'alert-type' => 'success'
        );
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = request()->validate([
            'titolo' => 'required|max:255',
            'email' => 'required',


        ]);
        $settings = Setting::find($id);
        $settings->titolo = $data['titolo'];
        $settings->email = $data['email'];
        // Check if a profile image has been uploaded
        if ($request->has('logo')) {
            // Get image file
            $image = $request->file('logo');
            // Make a image name based on user name and current timestamp
            $name = str_slug($request->input('titolo')) . '_' . time();
            // Define folder path
            $folder = '/uploads/images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $settings->logo = $filePath;
        }



        // if (isset($request['logo'])) {
        //     $settings->logo = $request['logo'];
        // }


        $settings->save();

        $notification = array(
            'message' => 'Modulo esame modificato con successo!',
            'alert-type' => 'success'
        );
        return back()->with($notification, $settings);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
