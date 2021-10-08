<?php

namespace App\Http\Controllers;

use App\kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori=kategori::all();
        return view('kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id=kategori::id();
        return view('kategori.input',compact('id'));
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
            'kategori' => 'required',


        ],$messages);

        $id=kategori::id();

        $kategori = new kategori;
        $kategori ->id = $id;
        $kategori ->nama_kategori = $request->kategori;
        $kategori ->deskripsi = $request->deskripsi;

        $kategori->save();

        return redirect('/kategori');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(kategori $kategori)
    {

        return view('kategori.update',compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kategori $kategori)
    {
        kategori::where('id',$kategori->id)
        ->update([
            'nama_kategori'=>$request->kategori,
            'deskripsi'=>$request->deskripsi,
        ]);
         return redirect('/kategori')->with('status', 'data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(kategori $kategori)
    {
        kategori::destroy($kategori->id);
        return redirect('/kategori')->with('status', 'data berhasil didelete');
    }
}
