<html lang="en" class="hydrated">

<head>
    <meta charset="UTF-8">
    <style data-styles="">
        ion-icon {
            visibility: hidden
        }

        .hydrated {
            visibility: inherit
        }
    </style>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $data['title'] }}</title>
    {{-- <!-- ======= Styles ====== -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="containernew">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <h5 class="title text-center"> <i class="fas fa-book"></i> APPAKUNTANSI </h5>
                    </a>
                </li>

                <li class="">
                    <a href="#">

                        <span class="title"> <i class="fas fa-home"></i> Dashboard</span>
                    </a>
                </li>

                <li class="">
                    <a href="#">

                        <span class="title"> <i class="fas fa-users"></i> Customers</span>
                    </a>
                </li>

                <li class="">
                    <a href="#">
                        {{-- <span class="icon">
                            <ion-icon name="chatbubble-outline" role="img" class="md hydrated" aria-label="chatbubble outline"></ion-icon>
                        </span> --}}
                        <span class="title"> <i class="fas fa-comment"></i> Messages</span>
                    </a>
                </li>

                <li class="">
                    <a href="#">
                        {{-- <span class="icon">
                            <ion-icon name="help-outline" role="img" class="md hydrated" aria-label="help outline"></ion-icon>
                        </span> --}}
                        <span class="title"><i class="fas fa-map-location-dot"></i> Wialayah</span>

                    </a>
                </li>

                <li class="">
                    <a href="#">
                        {{-- <span class="icon">
                            <ion-icon name="settings-outline" role="img" class="md hydrated" aria-label="settings outline"></ion-icon>
                        </span> --}}
                        <span class="title"> <i class="fas fa-gear"></i> Level</span>
                    </a>
                </li>

                <li class="hovered">
                    <a href="#">
                        {{-- <span class="icon">
                            <ion-icon name="lock-closed-outline" role="img" class="md hydrated" aria-label="lock closed outline"></ion-icon>
                        </span> --}}
                        <span class="title"> <i class="fas fa-user"></i> User</span>
                    </a>
                </li>

                <li class="">
                    <a href="#">
                        {{-- <span class="icon">
                            <ion-icon name="log-out-outline" role="img" class="md hydrated" aria-label="log out outline"></ion-icon>
                        </span> --}}
                        <span class="title"> <i class="fas fa-right-to-bracket"></i> Sign Out</span>

                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline" role="img" class="md hydrated"
                        aria-label="menu outline"></ion-icon>
                </div>

                {{-- <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline" role="img" class="md hydrated" aria-label="search outline"></ion-icon>
                    </label>
                </div> --}}

                <div class="user">
                    <img src="{{ asset('assets') }}/imgs/customer01.jpg" alt="">

                </div>
            </div>

            @yield('content')


            <script src="{{ asset('assets') }}/js/main.js"></script>
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule="" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
            </script>


            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


            @if (session('success'))
                <script>
                    Swal.fire({
                        title: "Yess",
                        text: "{{ session('success') }}",
                        icon: "success"
                    });
                </script>
            @endif

            @if (session('error'))
                <script>
                    Swal.fire({
                        title: "Opps",
                        text: "{{ session('error') }}",
                        icon: "error"
                    });
                </script>
            @endif

            <script>
                $(".btnhapus").click(function() {
                    var id = $(this).data('id');
                    var url = $(this).data('url');

                    Swal.fire({
                        title: "Apa kamu yakin?",
                        text: "Anda tidak akan dapat mengembalikan data ini!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Hapus"
                    }).then((result) => {
                        if (result.isConfirmed) {

                            $.ajax({
                                url: url + '/' + id,
                                type: 'DELETE',
                                data: {
                                    _token: '{{ csrf_token() }}'
                                },

                                success: function(response) {
                                    Swal.fire('Berhasil!', response.message, 'success').then(() => {
                                        location.reload();
                                    });
                                },

                                error: function() {
                                    Swal.fire('Gagal!', 'Terjadi kesalahan saat menghapus.', 'error');
                                }
                            })


                        }
                    });
                })
            </script>

</body>

</html>
