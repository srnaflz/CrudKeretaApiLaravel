
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tampil Kereta</div>

                <div class="card-body">

                   @csrf 
                    <div class="form-group">
                       <label>Nama Kereta</label>
                       <input type="text" name="nama" value="{{$kereta->kereta}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                       <label>Jam Berangkat</label>
                       <input type="text" name="berangkat" value="{{$kereta->jm_berangkat}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                       <label>Jam Tiba</label>
                       <input type="text" name="tiba"  value="{{$kereta->jm_tiba}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                       <label>Dari</label>
                       <input type="text" name="dari" value="{{$kereta->dari}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                       <label>Ke</label>
                       <input type="text" name="ke" value="{{$kereta->ke}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                         <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a></button>
                     </div>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
