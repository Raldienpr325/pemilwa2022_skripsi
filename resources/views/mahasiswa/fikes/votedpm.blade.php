@extends('admin.maintemplate')
@section('content')
    <center>
        <h1 style="padding-top:30px;font-family:Monaco,Helvetica, sans-serif"><strong> Dewan Perwakilan Mahasiswa
            </strong>
        </h1>
        <p style="font-family: Arial, Helvetica, sans-serif">Fakultas Ilmu Kesehatan Universitas Brawijaya</p>
    </center>
    <!-- Button trigger modal -->
    @if ($dpm->dpm_id != null)
        <div align="center" style="padding: 100px;font-family:georgia,garamond,serif;font-size:16px;font-style:italic">
            <h1> Terima kasih Atas Suara Anda ! </h1>
        </div>
        <style>
            h1 {
                font-size: 26px
            }

            .logoatas {
                margin-left: -30px
            }

            @media (min-width:360px) {}

            @media (min-width:320px) {

                /* smartphones, iPhone, portrait 480x320 phones */
                h1 {
                    font-size: 16px
                }
            }

            @media (min-width:481px) {

                /* portrait e-readers (Nook/Kindle), smaller tablets @ 600 or @ 640 wide. */
                h1 {
                    font-size: 16px
                }
            }

            @media (min-width:641px) {

                /* portrait tablets, portrait iPad, landscape e-readers, landscape 800x480 or 854x480 phones */
                h1 {
                    font-size: 16px
                }
            }

            @media (min-width:961px) {

                /* tablet, landscape iPad, lo-res laptops ands desktops */
                h1 {
                    font-size: 16px
                }
            }

            @media (min-width:1025px) {

                /* big landscape tablets, laptops, and desktops */
                h1 {
                    font-size: 16px
                }
            }

            @media (min-width:1281px) {

                /* hi-res laptops and desktops */
                h1 {
                    font-size: 16px
                }
            }
        </style>
    @else
        <div class="container" style="padding: 20px">
            <div class="row">
                @foreach ($dataFikes as $item)
                    <center>
                        <div class="col-md-4 p-md-4 ">
                            <div class="card" style="width: 18rem;">
                                <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top" alt="fotoDPMFK">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <h3>{{ $item->nama }} ( {{ $item->nourut }} )</h3>
                                    </h5>
                                    <p class="card-text"> Prodi {{ $item->prodi }} | Angkatan {{ $item->angkatan }}</p>

                                    <button type="button" class="glow-on-hover" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop{{ $item->id }}">Vote</button>
                                </div>
                            </div>
                        </div>
                    </center>
                    <form action="{{ route('storeVoting4', $item->id) }}" id="voting" method="post">
                        @method('POST')
                        @csrf
                        <div class="modal fade" id="staticBackdrop{{ $item->id }}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title fs-5" id="staticBackdropLabel">Anda memilih
                                        </h5>
                                    </div>
                                    <div class="modal-body">
                                        <h5 class="card-title">
                                            <p>Nama : {{ $item->nama }}</p>
                                        </h5>
                                        <p class="card-text"> Prodi {{ $item->prodi }} | Angkatan {{ $item->angkatan }}
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Yakin</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
    @endif

    <style>
        .card-img-top {
            height: 350px;
            widows: 120px;
        }

        .card {
            animation: fadeInAnimation ease 1s;
            animation-iteration-count: 1;
            animation-fill-mode: forwards;
        }


        @keyframes fadeInAnimation {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .glow-on-hover {
            width: 90px;
            height: 50px;
            border: none;
            outline: none;
            color: #fff;
            background: #111;
            cursor: pointer;
            position: relative;
            z-index: 0;
            border-radius: 10px;
        }

        .glow-on-hover:before {
            content: '';
            background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
            position: absolute;
            top: -2px;
            left: -2px;
            background-size: 400%;
            z-index: -1;
            filter: blur(5px);
            width: calc(100% + 4px);
            height: calc(100% + 4px);
            animation: glowing 20s linear infinite;
            opacity: 0;
            transition: opacity .3s ease-in-out;
            border-radius: 10px;
        }

        .glow-on-hover:active {
            color: #000
        }

        .glow-on-hover:active:after {
            background: transparent;
        }

        .glow-on-hover:hover:before {
            opacity: 1;
        }

        .glow-on-hover:after {
            z-index: -1;
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: #111;
            left: 0;
            top: 0;
            border-radius: 10px;
        }

        .img-fluid {
            width: 400px;
            height: 480px;
        }

        :root {
            --gradient: linear-gradient(to left top, #DD2476 10%, #FF512F 90%) !important;
        }

        body {
            background: #111 !important;
        }

        .card {
            background: #222;
            border: 1px solid #dd2476;
            color: rgba(250, 250, 250, 0.8);
            margin-bottom: 2rem;
        }
    </style>
    <script>
        < script src = "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity = "sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin = "anonymous" >
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
    </script>
    </script>
@endsection
