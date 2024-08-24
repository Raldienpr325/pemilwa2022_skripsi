@extends('admin.maintemplate')
@section('content')
    <div class="card">
        <div class="card-header">
            Input DPM Fakultas Kedokteran
        </div>
        <div class="card-body">
            <form action="{{ route('dpm-fk.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
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
                <div class="form-group">
                    <div class="row">
                        <div class="col-12">
                            <label for="prodi">Foto DPM</label>
                        </div>
                        <div class="col-12">
                            <div class="img-container">
                                <img width="150" height="200" class="img-preview">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="foto">Upload Foto DPM</label>
                    <div class="custom-file">
                        <input type="file" id="foto" name="foto"
                            class="custom-file-input @error('foto') is-invalid @enderror" required
                            onchange="previewimage()">
                        <label class="custom-file-label" for="foto">Pilih File</label>
                        @error('foto')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group text-right">
                    <button class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection

<style>
    .img-container {
        position: relative;
        width: 150px;
        height: 200px;
        overflow: hidden;
        border: 2px solid #ddd;
        border-radius: 5px;
        transition: border-color 0.3s ease-in-out;
    }

    .img-container:hover {
        border-color: #6c757d;
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

    .custom-file-label::after {
        content: 'Pilih';
    }

    .custom-file-input:lang(en)~.custom-file-label::after {
        content: 'Choose';
    }
</style>

<script>
    function previewimage() {
        const image = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview');
        const customFileLabel = document.querySelector(`label[for="foto"]`);

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
