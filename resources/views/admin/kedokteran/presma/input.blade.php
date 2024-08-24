@extends('admin.maintemplate')
@section('content')
    <div class="card">
        <div class="card-header">
            Input Presma Fakultas Kedokteran
        </div>
        <div class="card-body">
            <form action="{{ route('presma-fk.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nourut">No. Urut</label>
                            <input type="text" id="nourut" name="nourut"
                                class="form-control @error('nourut') is-invalid @enderror" placeholder="No urut"
                                required autofocus value="{{ old('nourut') }}">
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
                                required autofocus value="{{ old('nama') }}">
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
                                required autofocus value="{{ old('nama_wakil') }}">
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
                                required autofocus value="{{ old('angkatan') }}">
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
                                required autofocus value="{{ old('prodi') }}">
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
                                <input type="file" class="custom-file-input @error('foto') is-invalid @enderror"
                                    id="foto" name="foto" required onchange="previewimage('foto', '#img-preview')">
                                <label class="custom-file-label" for="foto">Pilih File</label>
                                @error('foto')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="img-container">
                                <img id="img-preview" src="#" alt="Foto Presma" class="img-preview" style="display: none;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="foto_wakil">Upload Foto Wakil</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('foto_wakil') is-invalid @enderror"
                                    id="foto_wakil" name="foto_wakil" required
                                    onchange="previewimage('foto_wakil', '#img-preview-wakil')">
                                <label class="custom-file-label" for="foto_wakil">Pilih File</label>
                                @error('foto_wakil')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="img-container">
                                <img id="img-preview-wakil" src="#" alt="Foto Wakil" class="img-preview" style="display: none;">
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
    .img-container {
        margin-top: 10px;
        position: relative;
        width: 150px;
        height: 200px;
        overflow: hidden;
        border: 2px solid #ddd;
        border-radius: 5px;
    }

    .img-preview {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        object-fit: cover;
        transition: transform 0.3s ease-in-out;
    }

    .img-container:hover .img-preview {
        transform: scale(1.1);
    }
</style>

<script>
    function previewimage(inputId, previewId) {
        const image = document.querySelector('#' + inputId);
        const imgPreview = document.querySelector(previewId);
        const customFileLabel = document.querySelector(`label[for="${inputId}"]`);

        imgPreview.style.display = 'block';
        const reader = new FileReader();

        reader.onload = function (e) {
            imgPreview.src = e.target.result;
        };

        reader.readAsDataURL(image.files[0]);

        // Update custom file label with selected file name
        customFileLabel.textContent = image.files[0].name;
    }
</script>
