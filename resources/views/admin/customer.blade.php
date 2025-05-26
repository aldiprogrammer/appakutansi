@extends('template.layout-admin')
@section('content')
    <div class="container">
        <div class="recentCustomers">
            <div class="cardHeader">
                <div class="d-flex justify-content-between">
                    <h2>Halaman {{ $data['title'] }}</h2>
                    <div>
                        <a href="{{ route('pdfcustomer') }}" target="_blank" class="btn "><i class="fas fa-download"></i> Download data customer</a>
                        <button class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i
                            class="fas fa-plus"></i>
                            Tambah {{ $data['title'] }}
                        </button>
                        </div>


                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-0" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('customer.create') }}" method="post">
                                    <div class="modal-body">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Nama</label>
                                            <input type="text" class="form-control" name="nama" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">NIK</label>
                                            <input type="number" class="form-control" name="nik" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">No Telp</label>
                                            <input type="number" class="form-control" name="no_telp" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Alamat</label>
                                            <textarea name="alamat" id="" cols="30" rows="10" class="form-control"></textarea>
                                        </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
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
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">NIK</th>
                            <th scope="col">No Telp</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Opsi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data['customer'] as $item)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->nik }}</td>
                                <td>{{ $item->no_telp }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>
                                    <button id="hapus" class="btn btnhapus" data-id="{{ $item->id }}"
                                        data-url='hapuscustomer'><i class="fas fa-trash"></i></button>
                                    <button class="btn" data-bs-toggle="modal"
                                        data-bs-target="#exampleModaledit{{ $item->id }}"> <i
                                            class="fas fa-pen"></i></button>
                                </td>
                            </tr>

                            <div class="modal fade" id="exampleModaledit{{ $item->id }}" tabindex="-0"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('customer.update', $item->id) }}" method="post">
                                            <div class="modal-body">
                                                @csrf
                                                @method('PUT')

                                                <div class="mb-3">
                                                    <label class="form-label">Nama</label>
                                                    <input type="text" value="{{ $item->nama }}" class="form-control"
                                                        name="nama" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">NIK</label>
                                                    <input type="text" class="form-control" value="{{ $item->nik }}"
                                                        name="nik" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">No Telp</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $item->no_telp }}" name="no_telp" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Alamat</label>
                                                    <textarea name="alamat" id="" cols="30" rows="10" class="form-control" required>{{ $item->alamat }}</textarea>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
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
