@extends('template.layout-admin')

@section('content')
    <div class="cardBox">
        <div class="card">
            <div>
                <div class="numbers">{{ $data['store'] }}</div>
                <div class="cardName">Store</div>
            </div>

            <div class="iconBx">
                <i class="fas fa-map-location-dot"></i>
            </div>
        </div>

        <div class="card">
            <div>
                <div class="numbers">{{ $data['level'] }}</div>
                <div class="cardName">Level</div>
            </div>

            <div class="iconBx">
                <i class="fas fa-users"></i>
            </div>
        </div>

        <div class="card">
            <div>
                <div class="numbers">{{ $data['user'] }}</div>
                <div class="cardName">User</div>
            </div>

            <div class="iconBx">
                <i class="fas fa-users"></i>
            </div>
        </div>

        <div class="card">
            <div>
                <div class="numbers">{{ $data['customer'] }}</div>
                <div class="cardName">Customer</div>
            </div>

            <div class="iconBx">
                <ion-icon name="chatbubbles-outline" role="img" class="md hydrated"
                    aria-label="chatbubbles outline"></ion-icon>
            </div>
        </div>


    </div>

    <!-- ================ Order Details List ================= -->
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Recent Orders</h2>
                <a href="#" class="btn">View All</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Price</td>
                        <td>Payment</td>
                        <td>Status</td>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>Star Refrigerator</td>
                        <td>$1200</td>
                        <td>Paid</td>
                        <td><span class="status delivered">Delivered</span></td>
                    </tr>

                    <tr>
                        <td>Dell Laptop</td>
                        <td>$110</td>
                        <td>Due</td>
                        <td><span class="status pending">Pending</span></td>
                    </tr>

                    <tr>
                        <td>Apple Watch</td>
                        <td>$1200</td>
                        <td>Paid</td>
                        <td><span class="status return">Return</span></td>
                    </tr>

                    <tr>
                        <td>Addidas Shoes</td>
                        <td>$620</td>
                        <td>Due</td>
                        <td><span class="status inProgress">In Progress</span></td>
                    </tr>

                    <tr>
                        <td>Star Refrigerator</td>
                        <td>$1200</td>
                        <td>Paid</td>
                        <td><span class="status delivered">Delivered</span></td>
                    </tr>

                    <tr>
                        <td>Dell Laptop</td>
                        <td>$110</td>
                        <td>Due</td>
                        <td><span class="status pending">Pending</span></td>
                    </tr>

                    <tr>
                        <td>Apple Watch</td>
                        <td>$1200</td>
                        <td>Paid</td>
                        <td><span class="status return">Return</span></td>
                    </tr>

                    <tr>
                        <td>Addidas Shoes</td>
                        <td>$620</td>
                        <td>Due</td>
                        <td><span class="status inProgress">In Progress</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- ================= New Customers ================ -->


        <div class="recentCustomers">
            <div class="card-body">
                <h5 class="">Customer Terbaru</h5>
                @foreach ($data['listcs'] as $ls)
                    <img src="{{ asset('assets/imgs/user.jpg') }}" class="img-thumbnail rounded-pill" alt="..."
                        style="height: 50px">

                    <div>
                        <div><span
                                class="text-danger fw-bold">{{ $ls->nama }}</span><br /><span>{{ $ls->no_telp }}</span>
                        </div>

                    </div>
                    <hr>
                @endforeach
            </div>

        </div>
    </div>
    </div>
    </div>
@endsection

<!-- ======================= Cards ================== -->
