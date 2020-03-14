@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Tampilkan Data Tiket
                </div>
                <div class="card-body">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Penumpang</label>
                            @foreach($tiket->pembeli as $value)
                              <li>{{$value->nama}}</li>
                              @endforeach
                        </div>
                        <div class="form-group">
                            <label for="">No Duduk</label>
                            <input type="text" name="nama" value="{{$tiket->no_duduk}}" class="form-control" readonly>
                        </div>
                         <div class="form-group">
                            <label for="">Jumlah</label>
                            <input type="text" name="nim" value="{{$tiket->jumlah}}" class="form-control" readonly>
                      
                        <div class="form-group">
                            <a href="{{url()->previous()}}" class="btn btn-primary btn-block">
                                Kembali
                            </a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
