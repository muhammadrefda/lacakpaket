@extends("layouts.global")
@section("title") Daftar Paket @endsection
@section("content")

    <a href="{{route("barang.create")}}">Tambahkan Paket</a>
    <br>
    <br>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th><b>Pengirim</b></th>
            <th><b>Kode Resi</b></th>
            <th><b>Penerima</b></th>
            <th><b>Alamat Penerima</b></th>
            <th><b>Status</b></th>
            <th><b>Action</b></th>
        </tr>
        </thead>
        <tbody>
        @foreach($barang as $b)
            <tr>
                <td>{{$b->Pengirim}}</td>
                <td>{{$b->kodeResi}}</td>
                <td>{{$b->Penerima}}</td>
                <td>{{$b->alamatPenerima}}</td>
                <td>{{$b->status}}</td>
                <td>
                    <a class="btn btn-info text-white btn-sm" href="{{route('barang.edit', ['id' => $b->id])}}">Edit</a>


                    <form action="{{ route('barang.destroy', $b->id) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                    </form>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
