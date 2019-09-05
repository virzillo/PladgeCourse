<?php

namespace App\Http\Controllers;

use App\Card;
use App\Course;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProposalController extends Controller
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
        $courses = Course::all();
        $cards = Card::all();

        return view('admin.offerte.index', compact('customers', 'courses', 'cards'));
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = "";
            $courses = DB::table('customers')->where('nome', 'LIKE', '%' . $request->search . "%")->get();
            if ($courses) {
                foreach ($courses as $key => $cors) {
                    $output .= '<tr>' .
                        '<td>' . $cors->id . '</td>' .
                        '<td>' . $cors->nome . '</td>' .
                        '<td>' . $cors->cognome . '</td>' .
                        '<td>' . $cors->email . '</td>' .
                        '</tr>';
                }
                return Response($output);
            }
        }
    }

    public function search_corso(Request $request)
    {
        if ($request->ajax()) {
            $output = "";
            $products = DB::table('courses')->where('nome', 'LIKE', '%' . $request->search . "%")->get();
            if ($products) {
                foreach ($products as $key => $product) {
                    $output .= '<tr>' .
                        '<td>' . $product->id . '</td>' .
                        '<td>' . $product->nome . '</td>' .
                        '</tr>';
                }
                return Response($output);
            }
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
        //
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
