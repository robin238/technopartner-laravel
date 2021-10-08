@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card-header card-no-border">
                  <a class="btn" style="background-color: rgb(51, 247, 51)" href="/inputtransaksi"> Tambah transaksi</a>
                  <a class="btn" style="background-color: rgb(130, 105, 245)" href="/list"> list by date</a>
            </div>

            <div class="col-12 mt-2">
                @include('alert.success')
                @include('alert.errors')
            </div>

            <div class="card">
                <div class="card-header card-no-border">
                <h5 style="text-align: center">Tabel transaksi</h5>
                </div>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Transaksi</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Nominal</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Aksi</th>
                      </tr>

                    </thead>
                    <tbody>
                      @foreach ($transaksi as $trs)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ $trs->jenis_transaksi }}</td>
                      <td>{{ $trs->nama_kategori }}</td>
                      <td>Rp.{{ number_format($trs->nominal) }}</td>
                      <td>{{ $trs->deskripsi }}</td>

                      <td>
                        <a href="/transaksi/{{ $trs->id }}" class="btn btn-primary btn-sm">edit</a>
                        <form action="/transaksi/hapus/{{$trs->id}}" method="post" class="d-inline" >
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">delete</button>
                        </form>
                      </td>

                    </tr>
                    @endforeach
                    </tbody>
                  </table>

            </div>
        </div>
    </div>
</div>
@endsection
