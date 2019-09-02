<?php

namespace App\Http\Controllers;

use App\Setting;
use App\Xsetting;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use UploadTrait;

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
        $settings = Setting::find(1)->first();
        $tipopagamento = Xsetting::where('nome', 'TipoPagamento')->get();
        return view('admin.settings.index', compact('settings', 'tipopagamento'));
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
            $name = $request->input('titolo') . '_' . time();
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
