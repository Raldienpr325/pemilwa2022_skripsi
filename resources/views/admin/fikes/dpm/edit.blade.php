@extends('admin.maintemplate')
@section('content')
    <div class="card-header">
        Edit DPM Fakultas Ilmu Kesehatan
    </div>
    <div class="content">
        <div class="card-body">
            <form action="{{ route('dpm-fikes.update', $id) }}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="nourut">No Urut</label>
                    <input type="text" id="nourut" name="nourut" class="form-control" value="{{ $data->nourut }}">
                </div>
                <div class="form-group">
                    <label for="nama">Nama DPM</label>
                    <input type="text" id="nama" name="nama" class="form-control" value="{{ $data->nama }}">
                </div>
                <div class="form-group">
                    <label for="angkatan">Angkatan</label>
                    <input type="text" id="angkatan" name="angkatan" class="form-control" value="{{ $data->angkatan }}">
                </div>
                <div class="form-group">
                    <label for="prodi">Prodi</label>
                    <input type="text" id="prodi" name="prodi" class="form-control" value="{{ $data->prodi }}">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-12">
                            <label for="prodi">Foto DPM</label>
                        </div>
                        <div class="col-12">
                            <img src="{{ asset('storage/' . $data->foto) }}" width="150" height="200"
                                class="img-preview">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="foto">Upload Foto Presma</label>
                    <p style="font-weight: bold"> Ingin mengganti foto persma ? </p>
                    <input type="hidden" name="oldFoto" value="{{ $data->foto }}">
                    <input type="file" id="foto" name="foto"
                        class="form-control-file @error('foto') is-invalid 
                @enderror" placeholder="foto"
                        onchange="previewimage()">
                    @error('foto')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-success btn-sm shadow-sm">Update</button>
                </div>
            </form>
        </div>
    </div>
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
