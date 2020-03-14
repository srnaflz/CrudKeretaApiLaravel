

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tampilkan Kelas</div>

                <div class="card-body">

                   @csrf   
                   <div class="form-group">

                   <label>Nama</label>
                    <input type="text" value="{{$kelas->pembeli->nama}}" name="nama" class="form-control" readonly>
                    </div>
                   <div class="form-group">
                       <label>Kelas</label>
                       <input type="text" name="kelas" value="{{kelas->kelas}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">

                   <label>Harga</label>
                    <input type="text" value="{{$kelas->kasir->harga}}" name="harga" class="form-control" readonly>
                    </div>
                  
                    <div class="form-group">
                         <a href="{{url()->previous()}}" class="btn btn-primary">Kembali</a>
                     </div>
                     
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

