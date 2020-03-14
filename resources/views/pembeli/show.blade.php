

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah pembeli</div>

                <div class="card-body">

                   @csrf 

                    <div class="form-group">
                       <label>Nama</label>
                       <input type="text" name="nama" value="{{ $pembeli->nama}}" class="form-control" readonly>
                    </div>

                    
                   <label>Nama Kereta</label>
                    <input type="text" value="{{$pembeli->kereta->kereta}}" name="kereta" class="form-control" readonly>
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

