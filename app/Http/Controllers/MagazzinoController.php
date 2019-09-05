<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Card;
use App\Token;
use App\Logcard;
use App\Eicardcode;

class MagazzinoController extends Controller
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
        $tot = Eicardcode::count();
        $eicard_code_attivi = count(Eicardcode::where('attivo', '1')->get());
        $eipass = Card::where('nome', 'Eipass Corsi on-line')->first();
        $upgrade = Card::where('nome', 'UPGRADE')->first();
        $pekit = Card::where('nome', 'PEKIT')->first();

        $tokens = Token::all();
        $concodice = Eicardcode::count('codice');
        // dd($eicard_code_attivi);
        // dd($eicard_code_attivi);
        // return view('admin.magazzino.index', compact('cards', 'logcards',  'tokens'));

        return view('admin.magazzino.index', compact('cards', 'logcards', 'eicard_code_attivi', 'concodice', 'tot', 'eipass', 'upgrade', 'pekit', 'token'));
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
