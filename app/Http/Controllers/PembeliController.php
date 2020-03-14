<?php

namespace App\Http\Controllers;

use App\Pembeli;
use Illuminate\Http\Request;
use App\Kereta;
use DB;

class PembeliController extends Controller
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
        $pembeli = Pembeli::with('kereta')->get();
        // $mhs = DB::table('mahasiswas')
        // ->select('mahasiswas.*', 'dosens.nama as nama_dosen', 'dosens.nipd')
        // ->join('dosens', 'dosens.id', '=', 'mahasiswas.id_dosen')
        // ->get();
        // dd($mhs);
        return view('pembeli.index',compact('pembeli'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kereta = Kereta::all();
        return view('pembeli.create',compact('kereta'));
   
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
        $pembeli = new Pembeli();
        $pembeli->nama = $request->nama;
        $pembeli->id_kereta = $request->id_kereta;
        $pembeli->save();
        return redirect()->route('pembeli.index')
        ->with(['message'=>'Data berhasil dibuat']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pembeli  $pembeli
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $pembeli = Pembeli::findOrFail($id);
        return view('pembeli.show',compact('pembeli'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pembeli  $pembeli
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
        $kereta = Kereta::all();
        $pembeli = Pembeli::findOrFail($id);
       
        // dd($select);
        return view('pembeli.edit',compact('pembeli','kereta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pembeli  $pembeli
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
    $pembeli = Pembeli::findOrFail($id);
       $pembeli->nama = $request->nama;
       $pembeli->id_kereta = $request->id_kereta;
       $pembeli->save();
        return redirect()->route('pembeli.index')
                ->with(['message'=>'Data berhasil di edit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pembeli  $pembeli
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $pembeli = Pembeli::findOrFail($id);
        $pembeli->delete();
        return redirect()->route('pembeli.index')
                ->with(['message'=>'Data berhasil dihapus']);
    }
}
