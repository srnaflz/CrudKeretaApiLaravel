@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Tambah Data Pembeli
                </div>
                <div class="card-body">
                    <form action="{{route('pembeli.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                      
                         <div class="form-group">
                            <label for="">Nama Kereta</label>
                            {{-- <input type="text" name="id_kereta"> --}}
                            <select name="id_kereta" class="form-control" required>
                                @foreach($kereta as $data)
                                <option value="{{$data->id}}">{{$data->kereta}}</option>
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
