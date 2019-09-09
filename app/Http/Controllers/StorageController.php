<?php

namespace App\Http\Controllers;

use Auth;
use App\Card;
use App\Token;
use App\Transaction;
use App\Logcard;
use App\Eicardcode;
use App\Tokenlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        // $cards = Card::all();
        // $logcards = Logcard::all();
        // $tot = Eicardcode::count();
        // $eicard_code_attivi = count(Eicardcode::where('attivo', '1')->get());
        // $eipass = Card::where('nome', 'Eipass Corsi on-line')->first();
        // $upgrade = Card::where('nome', 'UPGRADE')->first();
        // $pekit = Card::where('nome', 'PEKIT')->first();
        // $concodice = Eicardcode::count('codice');

        $tokens = Token::all();
        $token_logs = Tokenlog::all();


        return view('admin.storage.index', compact('tokens', 'token_logs'));

        // return view('admin.magazzino.index', compact('cards', 'logcards', 'eicard_code_attivi', 'concodice', 'tot', 'eipass', 'upgrade', 'pekit', 'token'));
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
            // 'id' => 'required|max:255',
            'nome' => 'required|max:255',
            'quantita' => 'required',
            'costo' => 'required',
        ]);

        //INSERSCI I DATI NELLA TOKEN GIUSTA COL NOME
        $token = Token::where('nome', $data['nome'])->first();

        $totale_costo_inserimento = $data['quantita'] * $data['costo'];
        $quantita_attuale = $token->quantita;
        $quantita_totale = $data['quantita'] + $quantita_attuale;


        $token->quantita =  $quantita_totale;
        $token->costo = $data['costo'];
        $token->save();


        Tokenlog::create([
            'token_id' => $token->id,
            'quantita' => $data['quantita'],
            'operatore' => Auth::user()->id,
            'costo' =>  $data['costo'],
            'tipomovimento' => 'out',
            'totale' =>  $totale_costo_inserimento,

        ]);

        Transaction::create([
            'nome' => 'Inserimento Token',
            'descrizione' => 'Inserimento magazzino di : ' . $data['nome'],
            'cifra' => $totale_costo_inserimento ,
            'tipo' => 'out',
            'ricorrente' => '0',

            'operatore' => Auth::user()->id,

        ]);

        $tokens = Token::all();
        $token_logs = Tokenlog::all();

        $notification = array(
            'message' => 'Dati inseriti con successo!',
            'alert-type' => 'success'
        );
        // return redirect()->route('storage.index', compact('notification', 'tokens', 'token_logs'));

        // return view('admin.storage.index', compact('notification', 'tokens', 'token_logs'));
        return back()->with('notification', 'tokens', 'token_logs');

        // if ($quantita_attuale < $data['quantita']) {
        //     $totale = $data['quantita'] - $quantita_attuale;
        //     Tokenlog::create([
        //         'card_id' => $token->id,
        //         'pos' => $token['quantita'],
        //         'operatore' => Auth::user()->id,
        //         'costo' => $data['costo'],
        //     ]);
        // } else {
        //     $totale = $data['quantita'] + $quantita_attuale;
        //     Tokenlog::create([
        //         'card_id' => $token->id,
        //         'neg' => $token['quantita'],
        //         'operatore' => Auth::user()->id,
        //         'costo' => $data['costo'],
        //     ]);
        // }

        // if ($card->nome == 'EICARD') {
        //     $i = 1;
        //     $qta = $card->quantita;
        //     while ($i <= $data['quantita']) :
        //         Eicardcode::create([
        //             'attivo' => '1',
        //         ]);
        //         $i++;
        //     endwhile;
        // }
        // $eipass = Card::where('nome', 'Eipass Corsi on-line')->first();
        // $upgrade = Card::where('nome', 'UPGRADE')->first();
        // $pekit = Card::where('nome', 'PEKIT')->first();

        // $tot = Eicardcode::count();
        // $eicard_code_attivi = count(Eicardcode::where('attivo', '1')->get());
        // $concodice = Eicardcode::count('codice');
        // return view('admin.magazzino.index', compact('notification', 'logcards', 'cards', 'eicard_code_attivi', 'tot', 'concodice', 'eipass', 'upgrade', 'pekit'));
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
        $data = request()->validate([
            'id' => 'required|max:255',
            'quantita' => 'required',
            'costo' => 'required',
        ]);

        $token_logs = Tokenlog::find($id);
        $token_logs->quantita = $data['quantita'];
        $token_logs->costo = $data['costo'];

        $totale_nuovo = $data['quantita']*$data['costo'];

        if ($totale_nuovo < $token_logs->totale){

            $differenza = $token_logs->totale - $totale_nuovo;
            $token_logs->totale = $totale_nuovo;
            dump($differenza);
            dump($token_logs->totale);

            Transaction::create([
                'nome' => 'Correzione magazzino',
                'descrizione' => 'Correzione magazzino su : ' . $token_logs->token->nome,
                'cifra' => $differenza,
                'tipo' => 'in',
                'ricorrente' => '0',

                'operatore' => Auth::user()->id,

            ]);
            //scrivere log operazioni magazzino


        }elseif ($totale_nuovo > $token_logs->totale){
            $differenza =  $totale_nuovo - $token_logs->totale;
            $token_logs->totale = $totale_nuovo;
            dump($differenza);
            dump($token_logs->totale);

            Transaction::create([
                'nome' => 'Correzione magazzino',
                'descrizione' => 'Correzione magazzino su : '. $token_logs->token->nome,
                'cifra' => $differenza,
                'tipo' => 'out',
                'ricorrente' => '0',

                'operatore' => Auth::user()->id,

            ]);
            //scrivere log operazioni magazzino


        }else{
            dump('uguale');

            //scrivere log operazioni magazzino

        }
        // dd($token_logs->totale);

        $token_logs->save();

        $tokens = Token::all();

        $notification = array(
            'message' => 'Token entry modificato con successo!',
            'alert-type' => 'success'
        );
        return back()->with($notification, $token_logs);
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
