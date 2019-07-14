@extends("layouts.global")
@section("title") Add Barang @endsection

@section("content")

    @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif

        <div class="col-md-8">
            <form
                enctype="multipart/form-data"
                class="bg-white shadow-sm p-3"
                action="{{route('barang.store')}}"
                method="POST">
                @csrf
                <label for="name">Pengirim</label>
                <input
                    class="form-control"
                    placeholder="Pengirim"
                    type="text"
                    name="Pengirim"
                    id="Pengirim"/>
                <br>
                <label for="kodeResi">Kode Resi</label>
                <input required
                    class="form-control"
                    placeholder="kode resi"
                    type="text"
                    name="kodeResi"
                    id="kodeResi" value="{{uniqid()}}"/>
                <br>

                <label for="penerima">Penerima</label>
                <input aria-required
                    class="form-control"
                    placeholder="Penerima"
                    type="text"
                    name="Penerima"
                    id="Penerima"/>
                <br>
                <label for="alamatPenerima">alamat Penerima</label>
                <input required minlength="5"
                    class="form-control"
                    placeholder="Alamat Penerima"
                    type="text"
                    name="alamatPenerima"
                    id="alamatPenerima"/>
                <br>
                <label for="">Status</label>
                <br>
                <input
                    type="checkbox"
                    name="status[]"
                    id="proses"
                    value="proses">
                <label for="proses">Proses</label>
                <br>
                <input
                    type="checkbox"
                    name="status[]"
                    id="diterima"
                    value="diterima">
                <label for="diterima">Diterima</label>
                <br>
                <input
                    class="btn btn-primary"
                    type="submit"
                    value="Save"/>
            </form>
        </div>
    @endsection
