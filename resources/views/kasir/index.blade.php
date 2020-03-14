@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Daftar Kasir
                <a href="{{route('kasir.create')}}" class="btn btn-primary float-right"> Tambah data
                </a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                    <table class="table">
                    <thead>
                    <tr>
                    <th>Nomor</th>
                               <th>Nama</th>
                               <th>Harga</th>
                               
                               <th colspan="3">AKSI</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $no = 1; @endphp
                    @foreach($kasir as $data)
                       <tr>
                       <td>{{$no++}}</td>
                          <td>{{$data->pembeli->nama}}</td>
                          <td>{{$data->harga}}</td>
                     
                         
                          <td><a href="{{route('kasir.show', $data->id)}}" class="btn btn-info">Show</a></td>
                          <td><a href="{{route('kasir.edit', $data->id)}}" class="btn btn-success">Edit</a></td>
                          <td>
                          
                          <form action="{{route('kasir.destroy',$data->id)}}" method="post">
                          @csrf 
                          @method('DELETE')
                          <button type="submit" onclik="return confirm('Apakah anda yakin ?');"
                           class="btn btn-danger">
                               Delete
                          </button>
                          </form>

                          </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
