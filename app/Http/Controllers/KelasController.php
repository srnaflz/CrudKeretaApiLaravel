<?php

namespace App\Http\Controllers;

use App\Kelas;
use Illuminate\Http\Request;
use DB;
use App\Pembeli;
use App\Kasir;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kelas = Kelas::with('pembeli','kasir')->get();
        // $mhs = DB::table('mahasiswas')
        // ->select('mahasiswas.*', 'dosens.nama as nama_dosen', 'dosens.nipd')
        // ->join('dosens', 'dosens.id', '=', 'mahasiswas.id_dosen')
        // ->get();
        // dd($mhs);
        return view('kelas.index',compact('kelas'));

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
        $kasir = Kasir::all();

        return view('kelas.create',compact('pembeli','kasir'));
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
       $kelas = new Kelas();
       $kelas->id_pembeli = $request->id_pembeli;
       $kelas->kelas = $request->kelas;
        $kelas->id_kasir = $request->id_kasir;
        $kelas->save();
        return redirect()->route('kelas.index')
        ->with(['message'=>'Data berhasil dibuat']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        //
        
        $kelas = Kelas::findOrFail($id);
        return view('kelas.show',compact('kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pembeli = Pembeli::all();
        $kasir = Kasir::all();

        $kelas = Kelas::findOrFail($id);
        return view('kelas.edit',compact('kelas','pembeli','kasir'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $kelas = Kelas::findOrFail($id);
        $kelas->id_pembeli = $request->id_pembeli;

        $kelas->kelas = $request->kelas;
        $kelas->id_kasir = $request->id_kasir;
        $kelas->save();
        return redirect()->route('kelas.index')
        ->with(['message'=>'Data berhasil dibuat']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();
         return redirect()->route('kelas.index')
                 ->with(['message'=>'Data berhasil dihapus']);
    }
}
