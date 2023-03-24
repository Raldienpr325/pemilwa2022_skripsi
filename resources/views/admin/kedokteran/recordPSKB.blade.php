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
            <h6 class="m-0 font-weight-bold text-primary">Mahasiswa PSKB</h6>
        </div>
        <div class="card-body">
            <table class="table table-responsive-lg table-bordered m-0 font-weight-bold text-dark">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>N0</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>NIM</th>
                        <th>Prodi</th>
                        <th>Pilihan Presma</th>
                        <th>Pilihan DPM</th>
                    </tr>
                </thead>
                @foreach ($datapemilih as $data)
                    <tbody class="body-td">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->NIM }}</td>
                        <td>{{ $data->prodi }}</td>
                        <td>{{ $data->pilihan_presma }}</td>
                        <td>{{ $data->pilihan_DPM }}</td>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection
