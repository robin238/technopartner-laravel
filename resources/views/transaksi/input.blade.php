@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                  <h5>Form transaksi</h5>
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

                <form class="form theme-form" action="/inputtransaksi" method="post">
                    @csrf
                    <div class="card-body">

                        <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label >ID Transaksi</label><sup style="color: red"></sup>
                                <input class="form-control" style="border: 1px solid rgb(2, 2, 2)" type="text" name="id"  value="{{ $id }}" readonly>
                              </div>
                            </div>
                        </div>

                        <div class="form-group">
                              <label  class="form-label">Jenis Transaksi</label>
                                <select class="form-control" name="transaksi" id="transaksi">
                                    <option >---Pilih kategori---</option>
                                  <option value="pemasukan">pemasukan</option>
                                  <option value="pengeluaran">pengeluaran</option>
                                </select>
                        </div>



                        <div class="form-group">
                            <label for="category_name" class="f-w-600">Kategori</label><sup style="color: red"> * Pilih jenis transaksi dahulu</sup>
                            <select name="kategori" id="kategori" class="form-control" required>

                            </select>
                        </div>



                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label >Nominal</label><sup style="color: red">* wajib diisi</sup>
                                <input class="form-control" style="border: 1px solid rgb(2, 2, 2)" type="text" name="nominal" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" value="{{ old('nominal') }}">
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label >deskripsi</label><sup style="color: red">* wajib diisi</sup>
                                <input class="form-control" style="border: 1px solid rgb(2, 2, 2)" type="text" name="deskripsi"  value="{{ old('deskripsi') }}">
                              </div>
                            </div>
                          </div>

                          <button class="btn btn-primary" type="submit">Submit</button>
                      </div>
                </form>
              </div>
        </div>
    </div>
</div>

<script>
    $(document).ready( function() {

        $('#transaksi').change(function(){
            var transaksi = $(this).val();
            if(transaksi){
                $.ajax({
                type:"GET",
                url:"/getpemasukan?jenis="+transaksi,
                dataType: 'JSON',
                success:function(res){
                    console.log(res);
                    if(res){
                        $("#kategori").empty();
                        $("#kategori").append('<option>---Pilih kategori---</option>');

                        var len = 0;
                        if (res != null) {
                            len = res.length;
                        }
                        if (len>0) {
                            for (var i = 0; i<len; i++) {
                                var id = res[i].id;
                                var name = res[i].nama_kategori;
                                var option = "<option value='"+id+"'>"+name+"</option>";
                                $("#kategori").append(option);
                            }
                        }
                    }else{
                    $("#kategori").empty();
                    }
                }
                });
            }



        });


    });
    </script>
@endsection
