@extends('admin.maintemplate')
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
