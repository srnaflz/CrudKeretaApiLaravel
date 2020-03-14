@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-13">
            <div class="card">
                <div class="card-header">Daftar Tiket
                <a href="{{route('tiket.create')}}" class="btn btn-primary float-right"> Tambah data
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
                               <th>NOMOR</th>
                               <th>Nama Penumpang</th>
                               <th>No Duduk </th>
                               <th>Jumlah</th>


                               <th colspan="3">AKSI</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $no = 1; @endphp
                    @foreach($tiket as $data)
                       <tr>
                       <td>{{$no++}}</td>
                       <td>@foreach($data->pembeli as $value)
                              <li>{{$value->nama}}</li>
                              @endforeach
                          </td>
                       <td>{{$data->no_duduk}}</td>
                       <td>{{$data->jumlah}}</td>
                    


                          <td><a href="{{route('tiket.show', $data->id)}}" class="btn btn-info">Show</a></td>
                          <td><a href="{{route('tiket.edit', $data->id)}}" class="btn btn-success">Edit</a></td>
                          <td>
                          <form action="{{route('tiket.destroy',$data->id)}}" method="post">
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
