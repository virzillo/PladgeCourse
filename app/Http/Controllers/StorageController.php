<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;
use Illuminate\Support\Facades\Validator;
use App\Logcard;
use Auth;
use App\Eicardcode;

class StorageController extends Controller
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
        $cards = Card::all();
        $logcards = Logcard::all();
        $tot = Eicardcode::count();
        $eicard_code_attivi = count(Eicardcode::where('attivo', '1')->get());
        $eipass = Card::where('nome', 'Eipass Corsi on-line')->first();
        $upgrade = Card::where('nome', 'UPGRADE')->first();
        $pekit = Card::where('nome', 'PEKIT')->first();

        $concodice = Eicardcode::count('codice');
        // dd($eicard_code_attivi);
        // dd($eicard_code_attivi);
        return view('admin.magazzino.index', compact('cards', 'logcards', 'eicard_code_attivi', 'concodice', 'tot', 'eipass', 'upgrade', 'pekit'));
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

        // if (request()->ajax()) {

        //     $data = request()->validate([
        //         'nome' => 'required|max:255',
        //         'quantita' => 'required',
        //         'costo' => 'required',
        //     ]);
        //     $temp_card = Card::where('nome', $data['nome'])->first();

        //     $card = Card::find($temp_card->id);

        //     $card->quantita = $data['quantita'];
        //     $card->costo = $data['costo'];
        //     $card->save();

        //     return response()->json(['data' => $card]);
        // }
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

        $card->quantita = $data['quantita'];
        $card->costo = $data['costo'];
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
        if ($card->nome == 'EICARD') {
            $i = 1;
            $qta = $card->quantita;
            while ($i <= $data['quantita']) :
                Eicardcode::create([
                    'attivo' => '1',
                ]);
                $i++;
            endwhile;
        }
        $eipass = Card::where('nome', 'Eipass Corsi on-line')->first();
        $upgrade = Card::where('nome', 'UPGRADE')->first();
        $pekit = Card::where('nome', 'PEKIT')->first();

        $tot = Eicardcode::count();
        $eicard_code_attivi = count(Eicardcode::where('attivo', '1')->get());
        $concodice = Eicardcode::count('codice');
        return view('admin.magazzino.index', compact('notification', 'logcards', 'cards', 'eicard_code_attivi', 'tot', 'concodice', 'eipass', 'upgrade', 'pekit'));
        // return back()->with($notification);
    }

    public function add(Request $request)
    { }
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
