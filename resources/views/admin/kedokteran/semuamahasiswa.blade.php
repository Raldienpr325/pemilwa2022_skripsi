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
            <h6 class="m-0 font-weight-bold text-primary">Semua Mahasiswa Kedokteran</h6>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Import Data Mahasiswa
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('importkedokteran') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-grup">
                                    <input type="file" name="file" required>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Import</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('allmahasiswa') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input type="text" class="form-control rounded" placeholder="Search" aria-label="Search"
                        aria-describedby="search-addon" name="q" />
                    <button type="submit" class="btn btn-outline-primary">search</button>
                </div>
            </form>
            &nbsp;
            <table class="table table-responsive-lg table-bordered m-0 font-weight-bold text-dark">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>N0</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>NIM</th>
                        <th>Prodi</th>
                    </tr>
                </thead>
                @forelse ($datas as $data)
                    <tbody class="body-td">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->NIM }}</td>
                        <td>{{ $data->prodi }}</td>
                    </tbody>
                @empty
                    <tr style="text-align: center">
                        <td> Data masih kosong </td>
                    </tr>
                @endforelse
            </table>
            &nbsp;
            {!! $datas->links() !!}
        </div>
    </div>
    @include('sweetalert::alert')
@endsection
