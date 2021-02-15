<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diskon;

class DiskonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diskon = Diskon::all();
        return view('master.diskon')->with('diskon', $diskon);
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
        $this->validate($request,[
            'diskon' => 'required|max:3'
        ]);

        $diskon = New Diskon;

        $diskon->diskon     = $request->diskon;
        $diskon->ket        = $request->ket;
        $diskon->userid     = $request->userid;

        $diskon->save();

        return redirect()->route('diskon');
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
    public function edit(Diskon $diskon)
    {
        return view('master.diskon_edit')->with('diskon', $diskon);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diskon $diskon)
    {
        $this->validate($request,[
            'diskon' => 'required|max:3'
        ]);

        $diskon->diskon = $request->diskon;
        $diskon->ket    = $request->ket;

        $diskon->save();

        return redirect()->route('diskon');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diskon $diskon)
    {
        $diskon->delete();
        return redirect()->route('diskon');
    }
}
