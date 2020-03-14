@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    Data Kereta
                    <a href="{{route('kereta.create')}}" class="float-right">
                        Tambah Data
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Nama</th>
                                    <th>Jam Berangkat</th>
                                    <th>Jam Tiba</th>
                                    <th>Dari</th>
                                    <th>Ke</th>

                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no=1; @endphp
                                @foreach($kereta as $data)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->kereta}}</td>
                                    <td>{{$data->jm_berangkat}}</td>
                                    <td>{{$data->jm_tiba}}</td>
                                    <td>{{$data->dari}}</td>
                                    <td>{{$data->ke}}</td>
                                    <td>
                                        <form action="{{route('kereta.destroy',$data->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{route('kereta.show',$data->id)}}" class="btn btn-sm btn-success">Lihat</a> |
                                            <a href="{{route('kereta.edit',$data->id)}}" class="btn btn-sm btn-warning">Edit</a> |
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin ?')">
                                                Hapus
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
</div>
@endsection
