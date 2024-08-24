@extends('admin.maintemplate')
@section('content')
    <div class="container">
        <center>
            <h1 style="padding-top: 30px; font-family: Arial, Helvetica, sans-serif;"><strong>Presiden Mahasiswa</strong></h1>
            <p style="font-family: Arial, Helvetica, sans-serif;">Fakultas Kedokteran Universitas Brawijaya</p>
        </center>
        @if (@$presma->presma_id != null)
            <div align="center" style="padding: 100px; font-family: Georgia, Garamond, serif; font-size: 16px; font-style: italic">
                <h1>Terima kasih Atas Suara Anda!</h1>
            </div>
        @else
            <div class="row">
                @foreach ($data as $item)
                    <div class="col-md-6" style="padding: 5px">
                        <div class="custom-card">
                            <div class="custom-card-body">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <div class="circle-icon">
                                            <p class="circle-icon-text">{{ $item->nourut }}</p>
                                        </div>
                                    </div>
                                    <div class="col-3"></div>
                                    <div class="col-9">
                                        <div class="row align-items-center">
                                            <div class="col-4">
                                                <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top img-fluid rounded-circle" alt="fotoWakil" style="width: 100px; height: 100px;">
                                            </div>
                                            <div class="col-8">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <p class="card-text mb-0">{{ $item->nama }} </p>
                                                        <p class="card-text mb-2"><button class="btn btn-sm btn-outline-primary" style="border-radius: 45px">Biodata</button> </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-3"></div>
                                    @if ($item->nama_wakil)
                                    <div class="col-9">
                                        <div class="row align-items-center">
                                            <div class="col-4">
                                                <img src="{{ asset('storage/' . $item->foto_wakil) }}" class="card-img-top img-fluid rounded-circle" alt="fotoWakil" style="width: 100px; height: 100px;">
                                            </div>
                                            <div class="col-8">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <p class="card-text mb-0">{{ $item->nama_wakil }} (Wakil) </p>
                                                        <p class="card-text mb-2"><button class="btn btn-sm btn-outline-primary" style="border-radius: 45px">Biodata</button> </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="text-center mt-3">
                                    <button type="button" class="btn btn-primary vote-btn" onclick="showConfirmation({{ $item->id }})">Vote</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('storeVoting', $item->id) }}" id="voting_{{ $item->id }}" method="post">
                        @method('POST')
                        @csrf
                    </form>
                @endforeach
            </div>
        @endif
    </div>

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
            font-size: 16px;
            color: #777;
            margin-bottom: 0;
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
            margin: 10px;
        }

        .circle-icon-text {
            margin: 0;
        }
        .custom-swal-content {
            font-size: 14px;
        }
        .swal2-styled.swal2-confirm,
        .swal2-styled.swal2-cancel
        {
            border-radius: 45px;
            font-size: 14px;
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
                url: '{{ route("searchPresmaId",":id") }}'.replace(':id',id),
                data: {
                    id:id
                },
                type : 'GET',
                success:function(data){
                    Swal.fire({
                        title: "Pilihan anda",
                        html: `<p>Apakah anda yakin dengan pilihan anda ? </p>
                                <table class="table table-striped">
                                    <tr>
                                        <td style="text-align: left;">Nama</td>
                                        <td style="text-align: left;">: ${data.nama}</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;">Nama wakil</td>
                                        <td style="text-align: left;">: ${data.nama_wakil}</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;">Prodi</td>
                                        <td style="text-align: left;">: ${data.prodi}</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;">Angkatan</td>
                                        <td style="text-align: left;">: ${data.angkatan}</td>
                                    </tr>
                                </table>`,
                        imageUrl: "img/ask2.jpg",
                        imageWidth: 200,
                        imageHeight: 200,
                        imageStyle: "max-width: 100%; height: auto;",
                        icon: "none", //
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yakin",
                        customClass: {
                            title: "my-swal-title",
                            htmlContainer: "my-swal-html-container",
                            content: "custom-swal-content",
                            confirmButton : "my-swal-confirm-button"
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
