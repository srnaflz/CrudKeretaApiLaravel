

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Tiket</div>

                <div class="card-body">
                <form action="{{route('tiket.store')}}" method="post">

                   @csrf 
              
                    <div class="form-group">
                    <div class="form-group">
                    <label for=" ">Nama Penumpang</label>
                    <select class="multiple form-control" name="pembeli[]" multiple="multiple">
                        @foreach ($pembeli as $data)
                            <option value="{{$data->id}}">{{$data->nama}}</option>
                        @endforeach
                    </select>
                    </div>
                  
                    <div class="form-group">
                       <label>No Duduk</label>
                       <input type="text" name="no_duduk" class="form-control" required>
                    </div>
              
                    <div class="form-group">
                       <label>jumlah</label>
                       <input type="text" name="jumlah" class="form-control" cols="50" rows="10" required> </textarea>
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

