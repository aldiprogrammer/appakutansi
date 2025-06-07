@extends('template.layout-admin')
@section('content')
<div class="container">
    <div class="recentCustomers">
        <div class="cardHeader">
            <div class="d-flex justify-content-between">
                <h2>Halaman {{ $data['title'] }}</h2>
            </div>
            <table class="table table-striped mt-5">
                <thead>
                    <tr>
                        <th scope="col">Marketplace</th>
                        <th scope="col">Store</th>
                        <th scope="col">Whatsapp</th>
                        <th scope="col">Customer</th>
                        {{-- <th scope="col">Rekening</th>
                        <th scope="col">Produk</th> --}}
                        <th scope="col">Transaksi</th>
                        {{-- <th scope="col">Rate</th>
                        <th scope="col">Admin</th>
                        <th scope="col">Biaya</th>
                        <th scope="col">Transfer</th> --}}
                        <th scope="col">Lokasi</th>
                        <th scope="col">Status</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Opsi</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($data['transaksi'] as $item)
                    <tr>
                        {{-- <th scope="row">{{ $no++ }}</th> --}}
                        <td>{{ $item->storemr->marketplace }}</td>

                        <td>{{ $item->store }}</td>
                        <td>{{ $item->customertr->wa }}</td>

                        <td>{{ $item->customertr->owner }}</td>
                        {{-- <td>{{ $item->rekeningtr->rekening }}</td>
                        <td>{{ $item->produktr->name }}</td> --}}
                        <td>{{ number_format($item->transaksi, 0, '.')  }}</td>

                        {{-- <td>{{ $item->rate }}</td>
                        <td>{{ $item->admin }}</td>
                        <td>{{ $item->biaya }}</td>
                        <td>{{ $item->transfer }}</td> --}}
                        <td>{{ $item->lokasi }}</td>
                        <td>
                            @if ($item->status == '1')
                                <small class="text-success fw-bold" style="font-weight: bold">Proses</small>
                            @endif
                        </td>
                        <td>{{ $item->tanggal }}</td>
                        <td>
                            <button id="status" class="btn btnstatus btn" data-id="{{ $item->id }}" data-url='updatestatusproses'><i class="fas fa-rotate"></i></button>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>



    </div>

</div>
@endsection

