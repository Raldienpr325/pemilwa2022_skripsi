@extends('admin.maintemplate')
@section('content')
    <style>
        th {
            text-align: center;
            vertical-align: middle;
            font-size: 12px
        }

        tbody.body-td td {
            text-align: center;
            vertical-align: middle;
            font-size: 12px
        }
    </style>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">DPM Fakultas Kedokteran</h6>
            <a href="{{ route('dpm-fk.create') }}" class="btn btn-success btn-sm shadow-sm">Add Data</a>
        </div>
        <div class="card-body">
            <table class="table table-responsive-lg table-bordered m-0 font-weight-bold text-dark">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>No </th>
                        <th>Foto DPM</th>
                        <th>Nama</th>
                        <th>Prodi</th>
                        <th>Tahun Angkatan</th>
                        <th>No urut</th>
                        <th>action</th>
                    </tr>
                </thead>
                @foreach ($data as $item)
                    <tbody class="body-td">
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $item->foto) }}" width="150" height="200">
                        </td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->prodi }}</td>
                        <td>{{ $item->angkatan }}</td>
                        <td>{{ $item->nourut }}</td>
                        <td>
                            <div class="row" style="margin-left: 0">
                                <form action="{{ route('dpm-fk.destroy', $item->id) }}" method="POST" style="width:50%">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger"
                                        style="background-color: red; color:white;font-weight:6 00;font-size:12px"
                                        type="submit">
                                        <i class="fas fa-trash"></i>
                                        Delete
                                    </button>
                                </form>
                                <button class=" btn btn-success" style="color:white;font-weight:600;font-size:12px">
                                    <i class="fas fa-pen"></i>
                                    <a href="{{ route('dpm-fk.edit', $item->id) }}"
                                        style="color: aliceblue;text-decoration:none">Edit</a>
                                </button>
                            </div>
                        </td>
                    </tbody>
                @endforeach

            </table>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection
