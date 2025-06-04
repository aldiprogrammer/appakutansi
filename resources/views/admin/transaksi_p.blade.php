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
                            <form action="{{ route('transaksi.create') }}" method="post">
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
                                        <select name="wa" id="wa" class="form-control">
                                            <option>-- Pilih Whatsapp Cust --</option>
                                            @foreach($data['customer'] as $wa)
                                            <option value="{{ $wa->id }}">{{ $wa->wa }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Customer</label>
                                        <input type="text" class="form-control" name="customer" id="customer" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Rekening</label>
                                        <select name="rekening" id="rekening" class="form-control"></select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Produk</label>
                                        <select name="produk" id="produk" class="form-control" required>
                                            <option value="">-- Pilih Produk --</option>
                                            @foreach ($data['produk'] as $pp )
                                                <option value="{{ $pp->id }}">{{ $pp->name }} - {{ $pp->level }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Rate</label>
                                        <input type="text" class="form-control" name="rate" id="rate" required readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Admin</label>
                                        <input type="text" class="form-control" name="admin" id="admin" required readonly>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label">Transaksi</label>
                                        <input type="number" class="form-control" id="transaksi" name="transaksi" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Biaya</label>
                                        <input type="number" class="form-control" id="biaya" name="biaya" required readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Transfer</label>
                                        <input type="number" class="form-control" id="transfer" name="transfer" required readonly>
                                    </div>


                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Lokasi</label>
                                        <select name="lokasi" id="lokasi" class="form-control" required>
                                            <option value="">-- Pilih Lokasi --</option>
                                            @foreach ($data['lokasi'] as $lk )
                                            <option value="{{ $lk->id }}">{{ $lk->wilayah }}</option>
                                            @endforeach
                                        </select>
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
                        <td>{{ $item->rekeningtr->rekening }}</td>
                        <td>{{ $item->produktr->name }}</td>
                        <td>{{ number_format($item->transaksi, 0, '.')  }}</td>
                        <td>{{ $item->rate }}</td>
                        <td>{{ number_format($item->admin, 0, '.')  }}</td>
                        <td>{{ number_format($item->biaya, 0, '.')  }}</td>
                        <td>{{ number_format($item->transfer, 0, '.')  }}</td>
                        <td>{{ $item->lokasitr->wilayah }}</td>
                        <td>
                            @if ($item->status == '0')
                                <small class="text-danger">Belum diproses</small>
                            @endif
                        </td>
                        <td>{{ $item->tanggal }}</td>
                        <td>
                            <button id="hapus" class="btn btnhapus" data-id="{{ $item->id }}" data-url='hapustransaksi'><i class="fas fa-trash"></i></button>
                            <button class="btn" data-bs-toggle="modal" data-bs-target="#exampleModaledit{{ $item->id }}"> <i class="fas fa-pen"></i></button>
                            <button id="status" class="btn btnstatus btn" data-id="{{ $item->id }}" data-url='updatestatus'><i class="fas fa-users"></i></button>

                        </td>
                    </tr>

                    <div class="modal fade" id="exampleModaledit{{ $item->id }}" tabindex="-0" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{ route('transaksi.update', $item->id) }}" method="post">
                                    <div class="modal-body">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Marketplace</label>
                                            <select name="marketplace" id="mr" class="form-control mr" data-id="{{ $item->id }}">
                                                <option value="{{ $item->storemr->id }}">{{ $item->storemr->marketplace }}</option>
                                                @foreach($data['marketplace'] as $mp)
                                                <option value="{{ $mp->id }}">{{ $mp->marketplace }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Store</label>
                                            <input type="text" class="form-control store" name="store" data-id="{{ $item->id }}" id="store" value="{{ $item->store }}" readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Whatsapp</label>
                                            <select name="wa" id="wa" class="form-control wa" data-id="{{ $item->id }}">
                                                <option value="{{ $item->customertr->id }}">{{ $item->customertr->wa }}</option>
                                                @foreach($data['customer'] as $wa)
                                                <option value="{{ $wa->id }}">{{ $wa->wa }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Customer</label>
                                            <input type="text" class="form-control customer" data-id="{{ $item->id }}" name="customer" id="customer" value="{{ $item->customer }}" readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Rekening</label>
                                            <select name="rekening" id="rekening" class="form-control rekening"  data-id="{{ $item->id }}">
                                                <option value="{{ $item->rekeningtr->id }}">{{ $item->rekeningtr->rekening }}</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Produk</label>
                                            <select name="produk" id="produk" class="form-control produk" data-id = "{{ $item->id }}" required>
                                                <option value="{{ $item->produktr->id }}">{{ $item->produktr->name }}</option>
                                                @foreach ($data['produk'] as $pp )
                                                <option value="{{ $pp->id }}">{{ $pp->name }} - {{ $pp->level }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Rate</label>
                                            <input type="text" class="form-control rate" data-id = "{{ $item->id }}" value="{{ $item->rate }}" name="rate" id="rate" required readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Admin</label>
                                            <input type="text" class="form-control admin" value="{{ $item->admin }}" name="admin" id="admin" data-id="{{ $item->id }}" required readonly>

                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Transaksi</label>
                                            <input type="number" class="form-control transaksi" value="{{ $item->transaksi }}" data-id="{{ $item->id }}" id="transaksi" name="transaksi" required>

                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Biaya</label>
                                            <input type="number" class="form-control biaya" data-id="{{ $item->id }}" value="{{ $item->biaya }}" id="biaya" name="biaya" required readonly>

                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Transfer</label>
                                            <input type="number" class="form-control transfer" data-id="{{ $item->id }}" value="{{ $item->transfer }}" id="transfer" name="transfer" required readonly>

                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Lokasi</label>
                                            <select name="lokasi" id="lokasi" class="form-control lokasi" data-id="{{ $item->id }}" required>

                                                <option value="{{ $item->lokasitr->id }}">{{ $item->lokasitr->wilayah }}</option>
                                                @foreach ($data['lokasi'] as $lk )
                                                <option value="{{ $lk->id }}">{{ $lk->wilayah }}</option>
                                                @endforeach
                                            </select>
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

