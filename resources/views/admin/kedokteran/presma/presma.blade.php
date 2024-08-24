@extends('admin.maintemplate')
@section('content')
    <style>
        th {
            text-align: center;
            vertical-align: middle;
            font-size: 12px;
            background-color: #1d3557;
            color: #fff;
        }

        td {
            text-align: center;
            vertical-align: middle;
            font-size: 12px;
        }

        .table-actions {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .table-actions a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }

        .btn-delete {
            background-color: #e63946;
            color: #fff;
            border: none;
            padding: 5px 10px;
            font-size: 12px;
            transition: background-color 0.3s ease;
        }

        .btn-delete:hover {
            background-color: #c62828;
        }

        .btn-delete i {
            margin-right: 5px;
        }

        .btn-edit {
            background-color: #457b9d;
            font-size: 12px;
        }

        .btn-add {
            background-color: #2a9d8f;
        }

        .btn-add:hover {
            background-color: #1d3557;
        }

        .card-header {
            background-color: #457b9d;
            color: #fff;
            font-weight: bold;
        }

        .btn-add i,
        .btn-edit i {
            margin-right: 5px;
        }
    </style>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold">Presiden Mahasiswa Fakultas Kedokteran</h6>
            <a href="{{ route('presma-fk.create') }}" class="btn btn-add btn-sm shadow-sm">
                <i class="fas fa-plus"></i> Add Data
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover m-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto PRESMA</th>
                            <th>Foto Wakil</th>
                            <th>Nama</th>
                            <th>Nama Wakil</th>
                            <th>Prodi</th>
                            <th>Tahun Angkatan</th>
                            <th>No Urut</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datapresmafk as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $data->foto) }}" width="150" height="200">
                                </td>
                                <td>
                                    <img src="{{ asset('storage/' . $data->foto_wakil) }}" width="150" height="200">
                                </td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->nama_wakil }}</td>
                                <td>{{ $data->prodi }}</td>
                                <td>{{ $data->angkatan }}</td>
                                <td>{{ $data->nourut }}</td>
                                <td>
                                    <div class="table-actions">
                                        <form action="{{ route('presma-fk.destroy', $data->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-delete btn-sm" type="submit">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                        <a href="{{ route('presma-fk.edit', $data->id) }}" class="btn btn-edit btn-sm">
                                            <i class="fas fa-pen"></i> Edit
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection
