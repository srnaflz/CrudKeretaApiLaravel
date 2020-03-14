<?php

namespace App\Http\Controllers;

use App\Kereta;
use Illuminate\Http\Request;

class KeretaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $kereta = Kereta::all();
        return view('kereta.index',compact('kereta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('kereta.create');

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
        $kereta = new Kereta();
        $kereta->kereta = $request->nama;
        $kereta->jm_berangkat = $request->berangkat;
        $kereta->jm_tiba = $request->tiba;
        $kereta->dari = $request->dari;
        $kereta->ke = $request->ke;
        $kereta->save();
        return redirect()->route('kereta.index')
        ->with(['message'=>'Kereta berhasil dibuat']);
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Kereta  $kereta
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        //
        $kereta = Kereta::findOrFail($id);
        return view('kereta.show',compact('kereta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kereta  $kereta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $kereta = Kereta::findOrFail($id);
        return view('kereta.edit',compact('kereta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kereta  $kereta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $kereta = Kereta::findOrFail($id);
        $kereta->kereta = $request->nama;
        $kereta->jm_berangkat = $request->berangkat;
        $kereta->jm_tiba = $request->tiba;
        $kereta->dari = $request->dari;
        $kereta->ke = $request->ke;
        $kereta->save();
          return redirect()->route('kereta.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kereta  $kereta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $kereta = Kereta::findOrFail($id)->delete();
        return redirect()->route('kereta.index')
                ->with(['message'=>'kereta berhasil dihapus']);
    }
}
