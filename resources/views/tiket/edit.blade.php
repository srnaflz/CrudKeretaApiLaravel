@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Tambah Data Mahasiswa
                </div>
                <div class="card-body">
                    <form action="{{route('tiket.update',$tiket->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Nama Penumpang</label>
                            <select class="js-multiple form-control" name="pembeli[]" multiple="multiple">
                                @foreach ($pembeli as $data)
                                    <option value="{{$data->id}}" {{ (in_array($data->id, $select)) ? 'selected' : '' }} >{{$data->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">No Duduk</label>
                            <input type="text" name="no_duduk" value="{{$tiket->no_duduk}}" class="form-control" required>
                        </div>
                         <div class="form-group">
                            <label for="">Jumlah</label>
                            <input type="text" name="jumlah" value="{{$tiket->jumlah}}" class="form-control" required>
                        </div>                
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.js-multiple').select2();
        });
    </script>
@endpush
