<?php

namespace App\Http\Controllers;

use App\Kasir;
use Illuminate\Http\Request;
use App\Pembeli;
use DB;
class KasirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kasir = Kasir::with('pembeli')->get();
        // $mhs = DB::table('mahasiswas')
        // ->select('mahasiswas.*', 'dosens.nama as nama_dosen', 'dosens.nipd')
        // ->join('dosens', 'dosens.id', '=', 'mahasiswas.id_dosen')
        // ->get();
        // dd($mhs);
        return view('kasir.index',compact('kasir'));

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
        return view('kasir.create',compact('pembeli'));
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
        $kasir = new Kasir();
        $kasir->harga = $request->harga;
        $kasir->id_pembeli = $request->id_pembeli;
        $kasir->save();
        return redirect()->route('kasir.index')
        ->with(['message'=>'Data berhasil dibuat']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kasir  $kasir
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $kasir = Kasir::findOrFail($id);
        return view('kasir.show',compact('kasir'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kasir  $kasir
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pembeli = Pembeli::all();
        $kasir = Kasir::findOrFail($id);
        return view('kasir.edit',compact('kasir','pembeli'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kasir  $kasir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $kasir = Kasir::findOrFail($id);
        $kasir->harga = $request->harga;
        $kasir->id_pembeli = $request->id_pembeli;
        $kasir->save();
        return redirect()->route('kasir.index')
        ->with(['message'=>'Data berhasil dibuat']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kasir  $kasir
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
       $kasir = Kasir::findOrFail($id);
       $kasir->delete();
        return redirect()->route('kasir.index')
                ->with(['message'=>'Data berhasil dihapus']);
    }
}
