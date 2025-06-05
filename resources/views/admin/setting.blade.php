@extends('template.layout-admin')
@section('content')
<div class="container">
    <div class="recentCustomers">
        <div class="cardHeader">
            <div class="d-flex justify-content-between">
                <h2>Halaman {{ $data['title'] }}</h2>
            </div>
            
            <div class="row">
                <div class="cardBox">
                    <div class="card">
                        <a href="/user" style="text-decoration: none">
                        <div>
                            <div class="numbers">{{ $data['user'] }}</div>
                            <div class="cardName">User</div>
                        </div>
                        </a>

                        <div class="iconBx">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>

                    <div class="card">
                        <a href="/wilayah" style="text-decoration: none">
                        <div>
                            <div class="numbers">{{ $data['lokasi'] }}</div>
                            <div class="cardName">Lokasi</div>
                        </div>
                        </a>

                        <div class="iconBx">
                            <i class="fas fa-map-location-dot"></i>

                        </div>
                    </div>

                    <div class="card">
                        <a href="/cost" style="text-decoration: none">
                        <div>
                            <div class="numbers">{{ $data['cost'] }}</div>
                            <div class="cardName">Cost</div>
                        </div>
                        </a>

                        <div class="iconBx">
                            <i class="fas fa-money-bill"></i>
                        </div>
                    </div>

                    <div class="card">
                        <a href="/store" style="text-decoration: none">
                        <div>
                            <div class="numbers">{{ $data['store'] }}</div>
                            <div class="cardName">Store</div>
                        </div>
                        </a>

                        <div class="iconBx">
                            <i class="fas fa-home"></i>
                        </div>
                    </div>


                    <div class="card">
                        <a href="/customer" style="text-decoration: none">
                        <div>
                            <div class="numbers">{{ $data['customer'] }}</div>
                            <div class="cardName">Customer</div>
                        </div>
                        </a>

                        <div class="iconBx">
                            <i class="fas fa-users"></i>

                        </div>
                    </div>

                    <div class="card">
                        <a href="/produk" style="text-decoration: none">
                        <div>
                            <div class="numbers">{{ $data['produk'] }}</div>
                            <div class="cardName">Product</div>
                        </div>
                        </a>
                        <div class="iconBx">
                            <i class="fas fa-money-check"></i>

                        </div>
                    </div>


                    <div class="card">
                        <a href="/level" style="text-decoration: none">
                            <div>
                                <div class="numbers">{{ $data['level'] }}</div>
                                <div class="cardName">Level</div>
                            </div>
                        </a>
                        <div class="iconBx">
                            <i class="fas fa-gears"></i>

                        </div>
                    </div>




                </div>

            </div>
           
        </div>
    </div>

</div>
@endsection

