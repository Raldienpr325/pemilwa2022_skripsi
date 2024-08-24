@extends('admin.maintemplate')
@section('content')
    <div class="card">
        <div class="card-header">
            Input Presma Fakultas Kedokteran
        </div>
        <div class="card-body">
            <form action="{{ route('presma-fk.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nourut">No. Urut</label>
                            <input type="text" id="nourut" name="nourut"
                                class="form-control @error('nourut') is-invalid @enderror" placeholder="No urut"
                                required autofocus value="{{ $data->nourut }}">
                            @error('nourut')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" id="nama" name="nama"
                                class="form-control @error('nama') is-invalid @enderror" placeholder="Nama"
                                required autofocus value="{{ $data->nama  }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama_wakil">Nama Wakil</label>
                            <input type="text" id="nama_wakil" name="nama_wakil"
                                class="form-control @error('nama_wakil') is-invalid @enderror" placeholder="Nama Wakil"
                                required autofocus value="{{ $data->nama_wakil  }}">
                            @error('nama_wakil')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="angkatan">Angkatan</label>
                            <input type="text" id="angkatan" name="angkatan"
                                class="form-control @error('angkatan') is-invalid @enderror" placeholder="Angkatan"
                                required autofocus value="{{ $data->angkatan  }}">
                            @error('angkatan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="prodi">Prodi</label>
                            <input type="text" id="prodi" name="prodi"
                                class="form-control @error('prodi') is-invalid @enderror" placeholder="Prodi"
                                required autofocus value="{{ $data->prodi  }}">
                            @error('prodi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="foto">Upload Foto Presma</label>
                            <div class="custom-file">
                                <input type="hidden" name="oldFoto" value="{{ $data->foto }}">
                                <input type="file" class="custom-file-input @error('foto') is-invalid @enderror"
                                id="foto" name="foto"  onchange="previewimage1()">

                                <label class="custom-file-label" for="foto">Pilih File</label>
                                @error('foto')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="img-container">
                                <img src="{{ asset('storage/' . $data->foto) }}" width="150" height="200" class="img-preview">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="foto_wakil">Upload Foto Wakil</label>
                            <div class="custom-file">
                                <input type="hidden" name="oldFotoWakil" value="{{ $data->foto_wakil }}">
                                <input type="file" class="custom-file-input @error('foto_wakil') is-invalid @enderror"
                                    id="foto_wakil" name="foto_wakil"
                                    onchange="previewimage2()">
                                <label class="custom-file-label" for="foto_wakil">Pilih File</label>
                                @error('foto_wakil')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="img-container">
                                <img src="{{ asset('storage/' . $data->foto_wakil) }}" width="150" height="200" class="img-preview-wakil">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group text-right">
                    <button class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection

<style>
    .card-header {
        background-color: #4e73df;
        color: #fff;
        font-weight: bold;
    }

    .card-body {
        background-color: #f8f9fc;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        font-weight: bold;
    }

    .form-group input[type="text"],
    .form-group input[type="file"] {
        border: 1px solid #d1d3e2;
        border-radius: 4px;
        padding: 8px;
        background-color: #fff;
    }

    .custom-file-label {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        background-color: #fff;
        border: 1px solid #d1d3e2;
        border-radius: 4px;
    }

    .img-container {
        position: relative;
        width: 150px;
        height: 200px;
        margin-top: 10px;
        overflow: hidden;
        border: 2px solid #ddd;
        border-radius: 5px;
    }

    .img-preview {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease-in-out;
    }

    .img-container:hover .img-preview {
        transform: scale(1.1);
    }

    .text-right {
        text-align: right;
    }

    .btn-success {
        background-color: #4e73df;
        border-color: #4e73df;
        color: #fff;
        font-weight: bold;
    }
</style>

<script>
      function previewimage1() {
        const image = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';
        const reader = new FileReader();

        reader.onload = function (e) {
            imgPreview.src = e.target.result;
        };

        reader.readAsDataURL(image.files[0]);
    }

    function previewimage2() {
        const image = document.querySelector('#foto_wakil');
        const imgPreview = document.querySelector('.img-preview-wakil');

        imgPreview.style.display = 'block';
        const reader = new FileReader();

        reader.onload = function (e) {
            imgPreview.src = e.target.result;
        };

        reader.readAsDataURL(image.files[0]);
    }
</script>
