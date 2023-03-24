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
            <h6 class="m-0 font-weight-bold text-primary">Semua Mahasiswa Ilmu Kesehatan</h6>
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
                            <form action="{{ route('importfikes') }}" method="POST" enctype="multipart/form-data">
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
                @forelse ($data as $item)
                    <tbody class="body-td">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->NIM }}</td>
                        <td>{{ $item->prodi }}</td>
                    </tbody>
                @empty
                    <tr style="text-align: center">
                        <td colspan="5">Data masih kosong</td>
                    </tr>
                @endforelse
            </table>
            &nbsp;
            {!! $data->links() !!}
        </div>
    </div>
    @include('sweetalert::alert')
@endsection
