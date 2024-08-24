@extends('admin.maintemplate')
@section('content')
    <center>
        <h1 style=padding-top:30px;font-family:Arial, Helvetica, sans-serif"><strong> Dewan Perwakilan
                Mahasiswa</strong>
        </h1>
        <p style="font-family: Arial, Helvetica, sans-serif">Fakultas Kedokteran Universitas Brawijaya</p>
    </center>
    @if (@$dpm->dpm_id != null)
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

                            <div class="custom-card" style="width: 18rem;">
                                <div class="circle-icon">
                                    <p class="circle-icon-text">{{ $item->nourut }}</p>
                                </div>
                                <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top" alt="fotoDPMFK">
                                <div class="custom-card-body">
                                    <h5 class="card-title">{{ $item->nama }}</h5>
                                    <p class="card-text">  {{ $item->prodi }} | Angkatan {{ $item->angkatan }}</p>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="button" class="btn btn-primary vote-btn" onclick="showConfirmation({{ $item->id }})">Vote</button>
                                </div>
                            </div>

                        </div>
                    </center>
                    <form action="{{ route('storeVoting4', $item->id) }}" id="voting" method="post">
                        @method('POST')
                        @csrf
                        <div class="modal fade" id="dpmfk{{ $item->id }}" data-bs-backdrop="static"
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
        .custom-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease-in-out;
            overflow: hidden;
        }

        .custom-card:hover {
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        }

        .custom-card-header {
            padding: 10px;
            text-align: center;
        }

        .card-title {
            margin-bottom: 0;
        }

        .card-text {
            font-size: 14px;
            color: #777;
            margin-bottom: 0;
            text-align: center;
        }

        .vote-btn {
            width: 100%;
            height: 40px;
            border: none;
            outline: none;
            color: #fff;
            background-color: #3498db;
            cursor: pointer;
            position: relative;
            z-index: 0;
            border-radius: 5px;
            transition: background-color 0.3s ease-in-out;
        }

        .vote-btn:hover {
            background-color: #2980b9;
        }

        .img-fluid {
            width: 100%;
            object-fit: cover;
        }

        /* Truncate long names */
        .card-title {
            margin-bottom: 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            padding: 10px;
        }

        .circle-icon {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background-color: #3498db;
            color: #fff;
            font-weight: bold;
        }

        .circle-icon-text {
            margin: 0;
        }
        .custom-card .card-img-top {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            object-fit: cover;
            object-position: center;
        }


    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>

    <script>
            window.addEventListener('load', function() {
            const cards = document.querySelectorAll('.custom-card');
            cards.forEach((card, index) => {
                gsap.from(card, {
                    delay: index * 0.1,
                    y: 100,
                    opacity: 0,
                    duration: 2.5,
                    ease: 'power4.out',
                });
            });
        });
        function showConfirmation(id) {
            $.ajax({
                url: '{{ route("searchDpmFikes",":id") }}'.replace(':id',id),
                data: {
                    id:id
                },
                type : 'GET',
                success:function(data){
                    console.log(data)
                    Swal.fire({
                        title: "Apakah anda yakin dengan pilihan anda?",
                        text:
                              "Nama: " + data.nama + "\n" +
                              "Prodi: " + data.prodi + "\n" +
                              "Angkatan: " + data.angkatan,
                        icon: "info",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yakin",
                        customClass: {
                            title: "my-swal-title",
                            htmlContainer: "my-swal-html-container"
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById("voting_" + id).submit();
                        }
                    });
                }
            })


         }

     </script>
@endsection
