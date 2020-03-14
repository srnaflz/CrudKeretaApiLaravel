
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Kereta</div>

                <div class="card-body">
                <form action="{{route('kereta.update',$kereta->id)}}" method="post">

                   @csrf 
                   @method('PATCH')
                    <div class="form-group">
                       <label>Nama Kereta</label>
                       <input type="text" name="nama" value="{{$kereta->kereta}}" class="form-control" required>
                    </div>
                    <div class="form-group">
                       <label>Jam Berangkat</label>
                       <input type="text" name="berangkat" value="{{$kereta->jm_berangkat}}" class="form-control" required>
                    </div>
                    <div class="form-group">
                       <label>Jam Tiba</label>
                       <input type="text" name="tiba" value="{{$kereta->jm_tiba}}" class="form-control" required>
                    </div>
                    <div class="form-group">
                       <label>Dari</label>
                       <input type="text" name="dari" value="{{$kereta->dari}}" class="form-control" required>
                    </div>
                    <div class="form-group">
                       <label>Ke</label>
                       <input type="text" name="ke" value="{{$kereta->ke}}" class="form-control" required>
                    </div>
                    <div class="form-group">
                         <button type="submit" class="btn btn-primary">Simpan</button>
                     </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
