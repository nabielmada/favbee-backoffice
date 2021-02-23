<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cs;

class CsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $cs = Cs::all();
        return view('master.cs')->with('cs', $cs);
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
            'nama'   => 'required',
            'alamat' => 'required',
            'nohp'   => 'required',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
    
        $imageName = $request->file('avatar')->getClientOriginalName();
        $imagePath = $request->avatar->move(public_path('images/cs'), $imageName);

        $cs = New Cs;

        $cs->nama   = $request->nama;
        $cs->alamat = $request->alamat;
        $cs->kota   = $request->kota;
        $cs->nohp   = $request->nohp;
        $cs->userid = $request->userid;
        $cs->avatar = $imageName;

        $cs->save();
        
        return redirect()->route('cs')->with('success', 'Data berhasil di tambahkan !');
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
        $cs = Cs::find($id);
        $cs->delete();
        return redirect()->route('cs')->with('success', 'Data berhasil di delete !');
    }
}
