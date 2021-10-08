<?php

namespace App\Http\Controllers;

use App\kategori;
use App\transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{

    public function home()
    {

        $pengeluaran= DB::table('transaksi')
        ->where('jenis_transaksi', '=', 'pengeluaran')
        ->sum('nominal');

        $pemasukan= DB::table('transaksi')
        ->where('jenis_transaksi', '=', 'pemasukan')
        ->sum('nominal');

        $saldo=$pemasukan-$pengeluaran;


        return view('home', compact('pengeluaran','pemasukan','saldo'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Carbon::now()->format('M');
        $transaksi= DB::table('transaksi')
        ->join('kategori', 'kategori.id', '=', 'transaksi.id_kategori')
        ->whereMonth('transaksi.created_at', Carbon::now()->month)
        ->select('kategori.nama_kategori','transaksi.*')
        ->get();

        return view('transaksi.index', compact('transaksi'));
    }

    public function list(){
        return view('transaksi.list');
    }

    public function sort(Request $request)
    {
        $transaksi= DB::table('transaksi')
        ->join('kategori', 'kategori.id', '=', 'transaksi.id_kategori')
        ->whereBetween('transaksi.created_at', [$request->start, $request->end])
        ->select('kategori.nama_kategori','transaksi.*')
        ->get();


        return view('transaksi.index', compact('transaksi'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id=transaksi::id();
        $kategori=kategori::all();
        return view('transaksi.input',compact('id','kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi',

        ];

        $request->validate([
            'transaksi' => 'required',
            'kategori' => 'required',
            'nominal' => 'required',
            'deskripsi' => 'required',

        ],$messages);

        $id=transaksi::id();

        $transaksi = new transaksi;
        $transaksi ->id = $id;
        $transaksi ->jenis_transaksi = $request->transaksi;
        $transaksi ->id_kategori = $request->kategori;
        $transaksi ->nominal = $request->nominal;
        $transaksi ->deskripsi = $request->deskripsi;

        $transaksi->save();

        return redirect('/transaksi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(transaksi $transaksi)
    {
        $kategori= kategori::where('deskripsi',$transaksi->jenis_transaksi)->get();
        return view('transaksi.update',compact('transaksi','kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, transaksi $transaksi)
    {
        transaksi::where('id',$transaksi->id)
        ->update([
            'jenis_transaksi'=>$request->transaksi,
            'id_kategori'=>$request->kategori,
            'nominal'=>$request->nominal,
            'deskripsi'=>$request->deskripsi,
        ]);
         return redirect('/transaksi')->with('status', 'data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(transaksi $transaksi)
    {
        transaksi::destroy($transaksi->id);
        return redirect('/transaksi')->with('status', 'data berhasil didelete');
    }

    public function getpemasukan(Request $request)
    {
        $kategori = kategori::where("deskripsi",$request->jenis)->get();
        return response()->json($kategori);
    }

}
