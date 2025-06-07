@extends('template.layout-admin')
@section('content')
    <div class="container">
        <div class="recentCustomers">
            <div class="cardHeader">
                <div class="d-flex justify-content-between">
                    <h2>Halaman {{ $data['title'] }}</h2>
                    <button class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i
                            class="fas fa-plus"></i>Tambah {{ $data['title'] }}</button>

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
                                <form action="{{ route('store.create') }}" method="post">
                                    <div class="modal-body">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Marketplace</label>
                                            <input type="text" class="form-control" name="marketplace" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Store Name</label>
                                            <input type="text" class="form-control" name="store_name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Bank</label>
                                            <input type="text" class="form-control" name="bank" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">No Rekening</label>
                                            <input type="text" class="form-control" name="no_rekening" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Nama Rekening</label>
                                            <input type="text" class="form-control" name="nama_rekening" required>
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
                            <th scope="col">Marketplace</th>
                            <th scope="col">Bank</th>
                            <th scope="col">No Rekening</th>
                            <th scope="col">Nama Rekening</th>
                            <th scope="col">Opsi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data['store'] as $item)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $item->marketplace }}</td>
                                <td>{{ $item->bank }}</td>
                                <td>{{ $item->no_rekening }}</td>
                                <td>{{ $item->nama_rekening }}</td>

                                <td>
                                    <button id="hapus" class="btn btnhapus" data-id="{{ $item->id }}"
                                        data-url='hapusstore'><i class="fas fa-trash"></i></button>
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
                                        <form action="{{ route('store.update', $item->id) }}" method="post">
                                            <div class="modal-body">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1"
                                                        class="form-label">Marketplace</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $item->marketplace }}" name="marketplace" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Store
                                                        Name</label>
                                                    <input type="text" class="form-control" name="store_name"
                                                        value="{{ $item->store_name }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Bank</label>
                                                    <input type="text" class="form-control" name="bank"
                                                        value="{{ $item->bank }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">No
                                                        Rekening</label>
                                                    <input type="text" class="form-control" name="no_rekening"
                                                        value="{{ $item->no_rekening }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Nama
                                                        Rekening</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $item->nama_rekening }}" name="nama_rekening" required>
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
