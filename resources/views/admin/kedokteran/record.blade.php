@extends('admin.maintemplate')
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
@section('content')
    <div class="card shadow mb-4">
        <div class="row">
            <div class="col-6">
                <h5 style="padding: 10px">Record Kedokteran</h5>
            </div>
            <div class="col-6">
                <button class="btn sm btn-success float-right mt-2 mr-2">Export</button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-responsive-lg table-bordered m-0 font-weight-bold text-dark">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>No </th>
                        <th>Nama</th>
                        <th>Nim</th>
                        <th>Email</th>
                        <th>Selected Presma</th>
                        <th>Selected DPM</th>
                        <th>Waktu ( mahasiswa Login )</th>
                    </tr>
                </thead>
                @foreach ($data as $item)
                    <tbody class="body-td">
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->user->NIM }}</td>
                            <td>{{ $item->user->email }}</td>
                            <td>{{ @$item->presma->nama ?? '-' }}</td>
                            <td>{{ @$item->dpm->nama ?? '-' }}</td>
                            <td>{{ @$item->created_at->format('H:i d, M Y') }}</td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
@endsection
