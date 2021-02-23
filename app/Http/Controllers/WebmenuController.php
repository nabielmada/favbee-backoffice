<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Webmenu;

class WebmenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $webmenu = Webmenu::all();
        return view('master.webmenu')->with('webmenu', $webmenu);
        

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
    public function update(Request $request, Webmenu $webmenu)
    {
        $this->validate($request, [
            'deskripsi_heading' => 'required',
            'deskripsi_sub'     => 'required',
        ]);

        $webmenu->deskripsi_heading = $request->deskripsi_heading;
        $webmenu->deskripsi_sub = $request->deskripsi_sub;

        $webmenu->save();

        return redirect()->route('webmenu')->with('success', 'Data berhasil di edit !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Webmenu $webmenu)
    {
        //
    }
}
