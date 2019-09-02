<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Auth;

class CustomerController extends Controller
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
        $customers = Customer::all();
        return view('admin.customers.index', compact('customers'));
    }


    public function query()
    {
        // $customers = Customer::potenziali()->orderBy('created_at')->get();
        $customers = Customer::ofType('0')->get();
        return view('admin.customers.index', compact('customers'));
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

        // Customer::create($this->validateRequest());

        $request['creator'] = Auth::user()->id;
        $request->validate([
            'nome' => 'required',
            'cognome' => 'required',
            'sesso' => 'required',
            'codfiscale' => 'required',
            'telefono' => 'min:2|required',
            'cellulare' => 'min:2',
            'email' => 'required',
            'password' => 'required',

            'citta' => 'required',
            'data' => 'required',
            'provincia' => 'required',

            'indirizzo' => 'required',
            'cittadom' => 'required',
            'provinciadom' => 'required',
            'cap' => 'required',

            'titolostudio' => 'required',
            'occupazione' => 'required',

        ]);


        $customer = Customer::create([
            'nome' => $request['nome'],
            'cognome' => $request['cognome'],
            'sesso' => $request['sesso'],
            'codfiscale' => $request['codfiscale'],
            'telefono' => $request['telefono'],
            'cellulare' => $request['cellulare'],
            'email' => $request['email'],
            'password' => $request['password'],

            'citta' => $request['citta'],
            'data' => $request['data'],
            'provincia' => $request['provincia'],

            'indirizzo' => $request['indirizzo'],
            'cittadom' => $request['cittadom'],
            'provinciadom' => $request['provinciadom'],
            'cap' => $request['cap'],

            'titolostudio' => $request['titolostudio'],
            'occupazione' => $request['occupazione'],
            'type' => '0',
            'active' => '1',
            'creator' => Auth::user()->id

        ]);
        $customer = Customer::all();

        $notification = array(
            'message' => 'Cliente inserito con successo!',
            'alert-type' => 'success'
        );

        // return view('admin.customers.index', compact('customers', 'companies'));
        return back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);
        return view('admin.customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('admin.customers.show', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $customer = Customer::find($id)->first();

        // $customer->nome = $request->get('nome');
        // $customer->cognome = $request->get('cognome');
        // $customer->email = $request->get('email');
        $customer->nome = $request['nome'];
        $customer->cognome = $request['cognome'];
        $customer->sesso = $request['sesso'];
        $customer->codfiscale = $request['codfiscale'];
        $customer->telefono = $request['telefono'];
        $customer->cellulare = $request['cellulare'];
        $customer->email = $request['email'];
        // $customer->password = $request['password'];

        $customer->citta = $request['citta'];
        $customer->data = $request['data'];
        $customer->provincia = $request['provincia'];

        $customer->indirizzo = $request['indirizzo'];
        $customer->cittadom = $request['cittadom'];
        $customer->provinciadom = $request['provinciadom'];
        $customer->cap = $request['cap'];

        $customer->titolostudio = $request['titolostudio'];
        $customer->occupazione = $request['occupazione'];

        $customer->save();

        // $customer->update($this->validateRequest());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        $notification = array(
            'message' => 'Cliente Eliminato con successo!',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    private function validateRequest()
    {

        return  request()->validate([
            'nome' => 'required|min:2',
            'cognome' => 'required|email',
            'sesso' => 'required',
            'codfiscale' => 'required',
            'telefono' => 'required',
            'cellulare' => 'required',

            'email' => 'required',
            'password' => 'required',
            'citta' => 'required',
            'data' => 'required',
            'provincia' => 'required',
            'indirizzo' => 'required',
            'cittadom' => 'required',
            'provinciadom' => 'required',
            'cap' => 'required',
            'titolostudio' => 'required',
            'tipologia' => 'required',
        ]);
    }
}
