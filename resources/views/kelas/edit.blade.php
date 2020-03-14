

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Kelas</div>

                <div class="card-body">
                <form action="{{route('kelas.update',$kelas->id)}}" method="post">


                   @csrf 
                   @method('PATCH')
                   <div class="form-group">

                   <label>Nama</label>
                   {{-- <input type="text" name="id_pembeli"> --}}
                            <select name="id_pembeli" class="form-control" required>
                                @foreach($pembeli as $data)
                                <option value="{{$data->id}}"
                                    {{ $data->id == $kelas->id_pembeli ? "selected" : "" }}>
                                    {{$data->nama}}
                                </option>
                                @endforeach
                            </select>
                    </div>
                   <div class="form-group">
                       <label>Kelas</label>
                       <input type="text" name="kelas" value="{{$kelas->kelas}}" class="form-control" required>
                    </div>
                   <label>Harga</label>
                   {{-- <input type="text" name="id_kasir"> --}}
                            <select name="id_kasir" class="form-control" required>
                                @foreach($kasir as $data)
                                <option value="{{$data->id}}"
                                    {{ $data->id == $kelas->id_kasir ? "selected" : "" }}>
                                    {{$data->harga}}
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

