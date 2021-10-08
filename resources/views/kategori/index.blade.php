@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card-header card-no-border">
                  <a class="btn" style="background-color: rgb(51, 247, 51)" href="/inputkategori"> Tambah Kategori</a>
            </div>

            <div class="col-12 mt-2">
                @include('alert.success')
                @include('alert.errors')
            </div>

            <div class="card">
                <div class="card-header card-no-border">
                <h5 style="text-align: center">Tabel Kategori</h5>
                </div>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">deskripsi</th>
                        <th scope="col">Aksi</th>
                      </tr>

                    </thead>
                    <tbody>
                      @foreach ($kategori as $kat)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ $kat->nama_kategori }}</td>
                      <td>{{ $kat->deskripsi }}</td>

                      <td>
                        <a href="/kategori/{{ $kat->id }}" class="btn btn-primary btn-sm">edit</a>
                        <form action="/kategori/hapus/{{$kat->id}}" method="post" class="d-inline" >
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
