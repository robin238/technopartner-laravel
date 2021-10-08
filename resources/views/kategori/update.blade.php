@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                  <h5>Form kategori</h5>
                </div>

                {{-- menampilkan error validasi --}}
                @if (count($errors) > 0)

                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                @endif

                <form class="form theme-form" action="/updatekategori/{{ $kategori->id }}" method="post">
                    @method('put')
                    {{-- {{ csrf_field() }} --}}
                    @csrf
                    <div class="card-body">

                        <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label >ID Kategori</label><sup style="color: red"></sup>
                                <input class="form-control" style="border: 1px solid rgb(2, 2, 2)" type="text" name="id"  value="{{ $kategori->id }}" readonly>
                              </div>
                            </div>
                        </div>

                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label >Nama Kategori</label><sup style="color: red">* wajib diisi</sup>
                              <input class="form-control" style="border: 1px solid rgb(2, 2, 2)" type="text" name="kategori"  value="{{ $kategori->nama_kategori }}">
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                            <label  class="form-label">Deskripsi</label>
                              <select class="form-control" name="deskripsi" id="deskripsi">
                                <option value="pemasukan" @if($kategori->deskripsi=="pemasukan")
                                    selected
                                @endif>pemasukan</option>
                                <option value="pengeluaran" @if($kategori->deskripsi=="pengeluaran")
                                    selected
                                @endif>pengeluaran</option>
                              </select>
                        </div>


                          <button class="btn btn-primary" type="submit">Submit</button>
                      </div>
                </form>
              </div>
        </div>
    </div>
</div>
@endsection
