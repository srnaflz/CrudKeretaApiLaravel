<?php

namespace App\Http\Controllers;

use App\Tiket;
use Illuminate\Http\Request;
use App\Pembeli;
use DB;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tiket = Tiket::with('pembeli')->get();
        // $mhs = DB::table('mahasiswas')
        // ->select('mahasiswas.*', 'dosens.nama as nama_dosen', 'dosens.nipd')
        // ->join('dosens', 'dosens.id', '=', 'mahasiswas.id_dosen')
        // ->get();
        // dd($mhs);
        return view('tiket.index',compact('tiket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pembeli = Pembeli::all();
        return view('tiket.create',compact('pembeli'));
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
        $tiket = new Tiket();
        $tiket->no_duduk = $request->no_duduk;
        $tiket->jumlah = $request->jumlah;
        $tiket->save();
        $tiket->pembeli()->attach($request->pembeli);  
        return redirect()->route('tiket.index')
                ->with(['message'=>'Data berhasil dibuat']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tiket  $tiket
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $tiket = Tiket::findOrFail($id);
        return view('tiket.show',compact('tiket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tiket  $tiket
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tiket = Tiket::findOrFail($id);
        $select = $tiket->pembeli->pluck('id')->toArray();
        $pembeli = Pembeli::all();
        return view('tiket.edit',compact('tiket','pembeli','select'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tiket  $tiket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $tiket = Tiket::findOrFail($id);
        $tiket->no_duduk = $request->no_duduk;
        $tiket->jumlah = $request->jumlah;
        $tiket->save();
        $tiket->pembeli()->sync($request->pembeli);  
        return redirect()->route('tiket.index')
                ->with(['message'=>'Data berhasil dibuat']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tiket  $tiket
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $tiket = Tiket::findOrFail($id);
        $tiket->pembeli()->detach();  
        $tiket->delete();
        return redirect()->route('tiket.index')
                ->with(['message'=>'Data berhasil dihapus']);
    }
}
