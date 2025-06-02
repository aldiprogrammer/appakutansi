@extends('template.layout-admin')
@section('content')
<div class="container">
    <div class="recentCustomers">
        <div class="cardHeader">
            <div class="d-flex justify-content-between">
                <h2>Halaman {{ $data['title'] }}</h2>
                <button class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class="fas fa-plus"></i>Tambah {{ $data['title'] }}</button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-0" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('level.create') }}" method="post">
                                <div class="modal-body">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Marketplace</label>
                                        <select name="marketplace" id="mr" class="form-control">
                                            <option>-- Pilih Marketplace --</option>
                                            @foreach($data['marketplace'] as $mp)
                                            <option value="{{ $mp->id }}">{{ $mp->marketplace }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label  class="form-label">Store</label>
                                        <input type="text" class="form-control" name="store" id="store" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Whatsapp</label>
                                        <select name="marketplace" id="wa" class="form-control">
                                            <option>-- Pilih Whatsapp Cust --</option>
                                            @foreach($data['customer'] as $wa)
                                            <option value="{{ $wa->id }}">{{ $wa->wa }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Customer</label>
                                        <input type="text" class="form-control" name="store" id="customer" readonly>
                                    </div>



                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped mt-5">
                <thead>
                    <tr>
                        <th scope="col">Marketplace</th>
                        <th scope="col">Store</th>
                        <th scope="col">Wa</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Rekening</th>
                        <th scope="col">Produk</th>
                        <th scope="col">Transaksi</th>
                        <th scope="col">Rate</th>
                        <th scope="col">Admin</th>
                        <th scope="col">Biaya</th>
                        <th scope="col">Transfer</th>
                        <th scope="col">Lokasi</th>
                        <th scope="col">Opsi</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($data['transaksi'] as $item)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $item->marketplace }}</td>
                        <td>{{ $item->store }}</td>
                        <td>{{ $item->wa }}</td>
                        <td>{{ $item->customer }}</td>
                        <td>{{ $item->rekening }}</td>
                        <td>{{ $item->produk }}</td>
                        <td>{{ $item->transaksi }}</td>
                        <td>{{ $item->rate }}</td>
                        <td>{{ $item->admin }}</td>
                        <td>{{ $item->biaya }}</td>
                        <td>{{ $item->transfer }}</td>
                        <td>{{ $item->lokasi }}</td>
                        <td>
                            <button id="hapus" class="btn btnhapus" data-id="{{ $item->id }}" data-url='hapuslevel'><i class="fas fa-trash"></i></button>
                            <button class="btn" data-bs-toggle="modal" data-bs-target="#exampleModaledit{{ $item->id }}"> <i class="fas fa-pen"></i></button>
                        </td>
                    </tr>

                    <div class="modal fade" id="exampleModaledit{{ $item->id }}" tabindex="-0" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{ route('level.update', $item->id) }}" method="post">
                                    <div class="modal-body">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Level</label>
                                            <input type="text" class="form-control" value="" name="level" id="exampleFormControlInput1" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>

        </div>



    </div>

</div>
@endsection

