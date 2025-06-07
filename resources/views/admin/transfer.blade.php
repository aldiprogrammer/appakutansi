@extends('template.layout-admin')
@section('content')
<div class="container">
    <div class="recentCustomers">
        <div class="cardHeader">

            <div class="d-flex justify-content-between mb-5">
                <h2>Halaman {{ $data['title'] }}</h2>
            </div>

            @foreach ($data['transaksi'] as $customer)
            <div class="ere" style="background-color: red;">
                <h5 class="text-white mx-2">{{ $customer->customer }} - Total Transfer : {{ number_format($customer->total_transfer, 0, ',', '.') }}</h5>
                @php
                    $rekening = DB::table('rekening_customers')->where('id', $customer->rekening)->first();
                @endphp
                <div class="mx-2 text-white fw-bold">{{ $rekening->rekening }} - {{ $rekening->no_rekening }} - {{ $rekening->nama_rekening }}</div>
            </div>

            <table class="table table-striped mt-2">
                <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Marketplace</th>
                        <th scope="col">Lokasi</th>
                        <th scope="col">Store</th>
                        <th scope="col">Whatsapp</th>
                        <th scope="col">Transaksi</th>
                        <th scope="col">Transfer</th>
                        <th scope="col">Status</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['transaksiall']->where('customer', $customer->customer) as $item)
                    <tr>
                        <td>{{ $item->tanggal }}</td>
                        <td>{{ $item->customer }}</td>
                        <td>{{ $item->storemr->marketplace }}</td>
                        <td>{{ $item->lokasi }}</td>
                        <td>{{ $item->store }}</td>
                        <td>{{ $item->customertr->wa }}</td>
                        <td>{{ number_format($item->transaksi, 0, '.')  }}</td>
                        <td>{{ number_format($item->transfer, 0, '.')  }}</td>

                        <td>
                            @if ($item->status == '1')
                            <small class="text-success fw-bold" style="font-weight: bold">Proses</small>
                            @endif
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
            @endforeach

        </div>

    </div>

</div>
@endsection

