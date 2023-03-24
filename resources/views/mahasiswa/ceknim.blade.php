<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>

<head>
    <title>Cek NIM</title>
    <!--Made with love by Mutiullah Samim -->

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login-mahasiswa.css') }}">
</head>

<body>
    @include('sweetalert::alert')
    <div class="parent clearfix">
        <div class="bg-illustration">
            {{-- <img src="https://i.ibb.co/Pcg0Pk1/logo.png" alt="logo"> --}}
        </div>

        <div class="login">
            <div class="container">
                <h1 style="font-family: Nunito, Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;font-weight:800">
                    Masukkan NIM anda</h1>
                <p
                    style="font-family: Nunito, Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;font-weight:600;color:red">
                    *
                    Jika NIM yang anda masukkan tidak sesuai maka hasil suara
                    dianggap tidak sah</p>
                <div class="login-form">
                    <form method="post" action="{{ route('handle-ceknim') }}">
                        @csrf
                        <div class="input-group form-group">
                            <input type="text" class="form-control" name="name"
                                value="{{ auth()->guard('user')->user()->name }}" readonly>
                        </div>
                        <div class="input-group form-group">
                            <input type="text" class="form-control" name="email"
                                value="{{ auth()->guard('user')->user()->email }}" readonly>
                        </div>
                        <div class="input-group form-group">
                            <input type="text" name="NIM" class="form-control" placeholder="NIM">
                        </div>

                        <div class="form-group">
                            <button type="submit">Login</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
