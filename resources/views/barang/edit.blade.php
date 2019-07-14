@extends('layouts.global')
@section('title') Edit Paket @endsection
@section('content')
    <div class="col-md-8">
        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif
        <form
            enctype="multipart/form-data"
            class="bg-white shadow-sm p-3"
            action="{{route('barang.update', ['id'=>$barang->id])}}" method="POST">
            @csrf
            <input
                type="hidden"
                value="PUT"
                name="_method">
            <label for="pengirim">Pengirim</label>
            <input
                value="{{$barang->Pengirim}}"
                class="form-control"
                placeholder="Pengirim"
                type="text"
                name="Pengirim"
                id="Pengirim"/>
            <br>
            <label for="kodeResi">Kode Resi</label>
            <input
                value="{{uniqid()}}"

                class="form-control"
                type="text"
                name="kodeResi"
                id="kodeResi"/>
            <br>
            <label for="penerima">Penerima</label>
            <input
                value="{{$barang->Penerima}}"
                class="form-control"
                type="text"
                name="Penerima"
                id="Penerima"/>
            <br>
            <label for="alamatPenerima">Alamat Penerima</label>
            <input
                value="{{$barang->alamatPenerima}}"
                class="form-control"
                type="text"
                name="alamatPenerima"
                id="alamatPenerima"/>
            <br>
            <label for="">Status</label>
            <br/>
            <input {{$barang->status == "proses" ? "checked" : ""}}
                   value="proses"
                   type="radio"
                   class="form-control"
                   id="proses"
                   name="status">
            <label for="proses">Proses</label>
            <input {{$barang->status == "diterima" ? "checked" : ""}}
                   value="diterima"
                   type="radio"
                   class="form-control"
                   id="diterima"
                   name="status">
            <label for="diterima">Diterima</label>
            <br>
            <input
                class="btn btn-primary"
                type="submit"
                value="Save"/>
        </form>
    </div>
@endsection
