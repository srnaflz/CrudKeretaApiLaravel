

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah pembeli</div>

                <div class="card-body">
                <form action="{{route('pembeli.update',$pembeli->id)}}" method="post">


                   @csrf 
                   @method('PATCH')

                    <div class="form-group">
                       <label>Nama</label>
                       <input type="text" name="nama" value="{{ $pembeli->nama}}" class="form-control" required>
                    </div>
                    
                   <label>Nama Kereta</label>
                   {{-- <input type="text" name="id_kereta"> --}}
                            <select name="id_kereta" class="form-control" required>
                                @foreach($kereta as $data)
                                <option value="{{$data->id}}"
                                    {{ $data->id == $pembeli->id_kereta ? "selected" : "" }}>
                                    {{$data->kereta}}
                                </option>
                                @endforeach
                            </select>
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

