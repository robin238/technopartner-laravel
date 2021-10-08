@extends('layouts.app')

@section('content')

<div style="display: flex; justify-content: center;">
    <div class="card" style="width: 18rem; margin-left: 50px ;float:left">
        <div class="card-body">
        <h5 class="card-title text-center" >Saldo saat ini</h5>
        <h3 class="card-text text-center">Rp.{{  number_format($saldo)  }}</h3>

        </div>
    </div>

    <div class="card" style="width: 18rem; margin-left: 50px ;float:left">
        <div class="card-body">
        <h5 class="card-title text-center" >Total Pengeluaran</h5>
        <h3 class="card-text text-center">Rp.{{ number_format($pengeluaran) }}</h3>

        </div>
    </div>

    <div class="card" style="width: 18rem; margin-left: 50px ;float:left">
        <div class="card-body">
        <h5 class="card-title text-center" >Total Pemasukan</h5>
        <h3 class="card-text text-center">Rp.{{ number_format($pemasukan) }}</h3>

        </div>
    </div>

</div>


@endsection
