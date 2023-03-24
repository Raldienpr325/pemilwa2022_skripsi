<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Diri Anda</title>
    <link rel="stylesheet" href="{{ asset('css/problem.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="login">
        <div class="login-screen">
            <div class="app-title">
                <h1>Problem ?</h1>
            </div>
            <form method="POST" action="{{ route('kirimAdmin') }}">
                @csrf
                <div class="login-form">
                    <div class="control-group">
                        <input type="text" class="login-field" value="" placeholder="Nama Anda" id="login-name"
                            name="name" autofocus required>
                        <label class="login-field-icon fui-user" for="login-name"></label>
                    </div>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <div class="control-group">
                        <input type="text" class="login-field" value="" placeholder="Nomor Induk"
                            id="login-name" name="NIM" required>
                        <label class="login-field-icon fui-user" for="login-name"></label>
                    </div>
                    @error('NIM')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <div class="control-group">
                        <input type="text" class="login-field" value="" placeholder="Mahasiswa / Dosen"
                            id="login-name" name="prodi" required>
                        <label class="login-field-icon fui-user" for="login-name"></label>
                    </div>
                    @error('prodi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <div class="control-group">
                        <input type="text" class="login-field" value="" placeholder="Email Anda"
                            id="login-name" name="email" required>
                        <label class="login-field-icon fui-user" for="login-name"></label>
                    </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="nomor_wa" id="flexRadioDefault1"
                            value="6282198105505">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Fakultas Kedokteran
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="nomor_wa" id="flexRadioDefault2"
                            value="6287863214510" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Fakultas Ilmu Kesehatan
                        </label>
                    </div>
                    @error('pesan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    &nbsp;
                    <div class="control-group">
                        <input type="text" class="login-field" value=""
                            placeholder="Tulis masalah Anda di sini..." id="login-name" name="pesan" required>
                        <label class="login-field-icon fui-user" for="login-name"></label>
                    </div>
                    @error('pesan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <button type="submit" class="btn btn-primary">
                        {{ __('Kirim') }}
                    </button>
                    <br>

                </div>
            </form>
        </div>
    </div>
</body>

</html>
