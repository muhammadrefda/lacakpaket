<?php

namespace App\Http\Controllers;

use App\ModelBarang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        /*$barang = \App\ModelBarang::paginate(10);*/


        $barang = ModelBarang::paginate(10);

        return view('barang.index',['barang'=> $barang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("barang.create");
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
        $new_barang =   new \App\ModelBarang();
        $new_barang->Pengirim = $request->get('Pengirim');
        $new_barang->kodeResi = $request->get('kodeResi');
        $new_barang->Penerima = $request->get('Penerima');
        $new_barang->alamatPenerima = $request->get('alamatPenerima');
        $new_barang->status = json_encode($request->get('status'));





        $new_barang->save();



        return redirect()->route('barang.create')->with('status','Paket Telah Ditambahkan.');
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
        $barang = ModelBarang::findOrFail($id);
        return view('barang.edit',['barang' => $barang]);
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
        $barang = ModelBarang::findOrFail($id);
        $barang->Pengirim = $request->get('Pengirim');
        $barang->kodeResi = $request->get('kodeResi');
        $barang->Penerima = $request->get('Penerima');
        $barang->alamatPenerima = $request->get('alamatPenerima');
        $barang->status = json_encode($request->get('status'));
        $barang->save();
        return redirect()->route('barang.edit', ['id' => $id])->with('status', 'Packet succesfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $barang = ModelBarang::where('id',$id)->first();
        $barang->delete();
        return redirect()->route('barang.index')->with('alert-success','Data berhasil dihapus!');
    }



/*    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $pegawai = DB::table('barang')
            ->where('kodeResi','like',"%".$cari."%")
            ->paginate();


        return view('homepage',['pegawai' => $pegawai]);

    }*/
}
