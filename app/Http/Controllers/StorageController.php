<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;
use Illuminate\Support\Facades\Validator;
use App\Logcard;
use Auth;

class StorageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = Card::all();
        $logcards = Logcard::all();
        return view('admin.magazzino.index', compact('cards', 'logcards'));
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
        //
    }

    public function add(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'nome' => 'required|max:255',
        //     'quantita' => 'required',
        //     'costo' => 'required',
        // ]);

        // if ($validator->fails()) {
        //     return back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }
        $data = request()->validate([
            'nome' => 'required|max:255',
            'quantita' => 'required',
            'costo' => 'required',
        ]);
        $temp_card = Card::where('nome', $data['nome'])->first();

        $card = Card::find($temp_card->id);

        $card->nome = $request->get('nome');
        $card->quantita = $request->get('quantita');
        $card->costo = $request->get('costo');

        $card->save();

        Logcard::create([
            'card_id' => $card->id,
            'quantita' => $data['quantita'],
            'operatore' => Auth::user()->id,
            'costo' => $data['costo'],

        ]);
        $logcards = Logcard::all();
        $cards = Card::all();

        $notification = array(
            'message' => 'Dati inseriti con successo!',
            'alert-type' => 'success'
        );
        return view('admin.magazzino.index', compact('notification', 'logcards', 'cards'));
        // return back()->with($notification);
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
        //
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
