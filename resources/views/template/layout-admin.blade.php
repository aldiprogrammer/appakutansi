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
                        <h5 class="title text-center"> <i class="fas fa-book"></i> APP</h5>
                    </a>
                </li>

                <li class="">
                    <a href="/dashboard">
                        <span class="title"> <i class="fas fa-home"></i> Dashboard</span>
                    </a>
                </li>

            
                <li class="">
                    <a href="/setting">
                        <span class="title"> <i class="fas fa-gear"></i> Setting</span>
                    </a>
                </li>

                <li class="">
                    <a href="/transaksicost">
                        <span class="title"> <i class="fas fa-money-bill"></i> Expenses</span>
                    </a>
                </li>

                <li class="">
                    <a href="/transaksi">
                        <span class="title"> <i class="fas fa-cash-register"></i> Transaction</span>
                    </a>
                </li>


                <li class="">
                    <a href="/proses">
                        <span class="title"> <i class="fas fa-calendar-check"></i> Proses</span>
                    </a>
                </li>

                <li class="">
                    <a href="/transfer">
                        <span class="title"> <i class="fas fa-money-bill-transfer"></i> Transfer</span>

                    </a>
                </li>



                <li class="">
                    <a href="/logout">
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
                    <img src="{{ asset('assets') }}/imgs/user.png" alt="">

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
                });

                $(".typecost").change(function() {
                    var id = $(this).val();
                    $.ajax({
                        url: "/detailcost/" + id,
                        type: 'GET',
                        success: function(response) {
                            $("#detailcost").val(response.detail);
                            $(".editdetailcost").val(response.detail);
                        },
                        error: function(error) {
                            console.log(error.message);

                        }
                    })
                });

                $("#mr").change(function(){
                    var id = $(this).val();
                    $.ajax({
                        url : 'store/'+id,
                        type : 'GET',
                        success : function(response){
                            $("#store").val(response.store);
                        },
                        error : function(err){
                            console.log(err.message);
                            
                        }
                    })
                });

                $(".mr").change(function(){
                    var id = $(this).val();
                    var data = $(this).data('id');
                    $.ajax({
                        url : 'store/'+id,
                        type : 'GET',
                        success : function(response){
                            $(".store").val(response.store);
                        },
                        error : function(err){
                            console.log(err.message);
                            
                        }
                    })
                });


                $("#wa").change(function(){
                    var id = $(this).val();
                    $.ajax({
                        url : 'customer/'+id,
                        type : 'GET',
                        success : function(response){
                             $("#customer").val(response.customer);
                            $("#rekening").html(response.rekening);
                             
                        },
                        error : function(error){
                            console.log(error.message);
                        }
                    })
                });

                $(".wa").change(function(){
                    var id = $(this).val();
                    $.ajax({
                    url : 'customer/'+id,
                    type : 'GET',
                    success : function(response){
                    $(".customer").val(response.customer);
                    $(".rekening").html(response.rekening);

                    },
                    error : function(error){
                    console.log(error.message);
                    }
                    })
                });


                $("#produk").change(function(){
                    var id = $(this).val();
                    $.ajax({
                        url : 'produk/'+id,
                        type : 'GET',
                        success : function(response){
                            $("#rate").val(response.rate);
                            $("#admin").val(response.admin);
                        },
                        error : function(error){
                        }
                    })
                });

                $(".produk").change(function(){
                var id = $(this).val();
                    $.ajax({
                    url : 'produk/'+id,
                    type : 'GET',
                    success : function(response){
                    $(".rate").val(response.rate);
                    $(".admin").val(response.admin);
                    },
                    error : function(error){
                    }
                    })
                });

                
                $("#transaksi").keyup(function(){
                    var val = $(this).val();
                    var rate = $("#rate").val();
                    var rate2 = parseFloat(rate);
                    var persentase = rate2 / 100;
                    var hasil = persentase * val;
                    var admin = $("#admin").val();
                    var transfer = val - hasil - admin

                    $("#biaya").val(hasil);
                    $("#transfer").val(transfer);
                   
                })

                $(".transaksi").keyup(function(){
                var val = $(this).val();
                var rate = $(".rate").val();
                var rate2 = parseFloat(rate);
                var persentase = rate2 / 100;
                var hasil = persentase * val;
                var admin = $(".admin").val();
                var transfer = val - hasil - admin

                $(".biaya").val(hasil);
                $(".transfer").val(transfer);

                })


                $(".btnstatus").click(function() {
                        var id = $(this).data('id');
                        var url = $(this).data('url');

                        Swal.fire({
                        title: "Apa kamu yakin?",
                        text: "Ingin mengupdate status transaksi ini",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Update"
                        }).then((result) => {
                        if (result.isConfirmed) {

                        $.ajax({
                        url: url + '/' + id,
                        type: 'PUT',
                        data: {
                        _token: '{{ csrf_token() }}'
                        },

                        success: function(response) {
                        Swal.fire('Berhasil!', response.message, 'success').then(() => {
                        location.reload();
                        });
                        },

                        error: function() {
                        Swal.fire('Gagal!', 'Terjadi kesalahan saat mengupdate.', 'error');
                        }
                        })


                        }
                        });
                });


            </script>

</body>

</html>
