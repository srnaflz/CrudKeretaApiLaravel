@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Tambah Data Kereta Api
                </div>
                <div class="card-body">
                <div class="card-body">
                <form action="{{route('kereta.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Kereta</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Jam Berangkat</label>
                            <input type="text" name="berangkat" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Jam Tiba</label>
                            <input type="text" name="tiba" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Dari</label>
                            <input type="text" name="dari" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Ke</label>
                            <input type="text" name="ke" class="form-control" required>
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
