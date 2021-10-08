@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                  <h5>Form date transaksi</h5>
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

                <form class="form theme-form" action="/sort" method="post">
                    @csrf
                    <div class="card-body">



                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label >Start Date</label><sup style="color: red">* wajib diisi</sup>
                                <input class="form-control" style="border: 1px solid rgb(2, 2, 2)" type="date" name="start" >
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label >End Date</label><sup style="color: red">* wajib diisi</sup>
                                <input class="form-control" style="border: 1px solid rgb(2, 2, 2)" type="date" name="end" >
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
@endsection
