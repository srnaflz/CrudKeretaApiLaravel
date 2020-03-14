@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Tambah Data Kasir
                </div>
                <div class="card-body">
                    <form action="{{route('kasir.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Harga</label>
                            <input type="text" name="harga" class="form-control" required>
                        </div>
                        
                         <div class="form-group">
                            <label for="">Nama</label>
                            {{-- <input type="text" name="id_pembeli"> --}}
                            <select name="id_pembeli" class="form-control" required>
                                @foreach($pembeli as $data)
                                <option value="{{$data->id}}">{{$data->nama}}</option>
                                @endforeach
                            </select>
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
