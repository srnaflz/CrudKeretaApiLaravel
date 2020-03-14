

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Kasir</div>

                <div class="card-body">
                <form action="{{route('kasir.update',$kasir->id)}}" method="post">


                   @csrf 
                   @method('PATCH')

                    <div class="form-group">
                       <label>Harga</label>
                       <input type="text" name="harga" value="{{ $kasir->harga}}" class="form-control" required>
                    </div>
                   
                   <label>Nama</label>
                   {{-- <input type="text" name="id_pembeli"> --}}
                            <select name="id_pembeli" class="form-control" required>
                                @foreach($pembeli as $data)
                                <option value="{{$data->id}}"
                                    {{ $data->id == $kasir->id_pembeli ? "selected" : "" }}>
                                    {{$data->nama}}
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

