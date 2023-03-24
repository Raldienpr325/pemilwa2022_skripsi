@extends('admin.maintemplate')
@section('content')
    <div class="card-header">
        Input Presma Fakultas Kedokteran
    </div>
    <div class="content">
        <div class="card-body">
            <form action="{{ route('presma-fk.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <input type="text" id="nourut" name="nourut"
                        class="form-control @error('nourut') is-invalid 
                @enderror" placeholder="No urut"
                        required autofocus value="{{ old('nourut') }}">
                    @error('nourut')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" id="nama" name="nama"
                        class="form-control @error('nama') is-invalid 
                @enderror" placeholder="Nama"
                        required autofocus value="{{ old('nama') }}">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>
                <div class="form-group">
                    <input type="text" id="angkatan" name="angkatan"
                        class="form-control @error('angkatan') is-invalid     
                @enderror"
                        placeholder="Angkatan" required autofocus value="{{ old('angkatan') }}">
                    @error('angkatan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" id="prodi" name="prodi"
                        class="form-control @error('prodi') is-invalid     
                @enderror" placeholder="Prodi"
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
                            <label for="prodi">Foto Presma</label>
                        </div>
                        <div class="col-12">
                            <img width="150" height="200" class="img-preview">
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <label for="foto">Upload Foto Presma</label>
                    <input type="file" id="foto" name="foto"
                        class="form-control-file @error('foto') is-invalid 
                @enderror" placeholder="foto"

                        required onchange="previewimage()">

                    @error('foto')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-success btn-sm shadow-sm">Save</button>
                </div>
            </form>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection

<script>
    function previewimage() {
        const image = document.querySelector('#foto')
        const imgPreview = document.querySelector('.img-preview')

        imgPreview.style.display = 'block'
        const ofReader = new FileReader()

        ofReader.readAsDataURL(image.files[0])
        ofReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result
        }

    }
</script>
