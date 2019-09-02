<?php

namespace App\Http\Controllers;

use App\Xsetting;
use Illuminate\Http\Request;

class XsettingController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Xsetting::create([
            'nome' => 'TipoPagamento',
            'valore' => $request['valore'],
        ]);

        $notification = array(
            'message' => 'Tipo pagamento inserito con successo!',
            'alert-type' => 'success'
        );
        $tipopagamento = Xsetting::where('nome', 'TipoPagamento')->get();
        return back()->with($notification, $tipopagamento);
    }
}
