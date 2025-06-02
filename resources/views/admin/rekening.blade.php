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
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Rekening</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('rekening.create') }}" method="post">
                                <div class="modal-body">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Kode Customer</label>
                                        <input type="text" class="form-control" readonly name="kode" value="{{ $data['kode'] }}" id="exampleFormControlInput1" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Rekening</label>
                                        <input type="text" class="form-control" name="rekening" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">No Rekening</label>
                                        <input type="number" class="form-control" name="no_rekening" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Nama Rekening</label>
                                        <input type="text" class="form-control" name="nama_rekening" required>
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
                        <th scope="col">No</th>
                        <th scope="col">Kode Customer</th>
                        <th scope="col">Rekening</th>
                        <th scope="col">No Rekening</th>
                        <th scope="col">Nama Rekening</th>
                        <th scope="col">Status</th>
                        <th scope="col">Opsi</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($data['rekening'] as $item)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $item->kode_customer }}</td>
                        <td>{{ $item->rekening }}</td>
                        <td>{{ $item->no_rekening }}</td>
                        <td>{{ $item->nama_rekening }}</td>
                        <td>{{ $item->status == '1' ? 'Aktif' : 'Tidak aktif' }}</td>
                        <td>
                            <button id="hapus" class="btn btnhapus" data-id="{{ $item->id }}" data-url='hapusrekening'><i class="fas fa-trash"></i></button>
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
                                <form action="{{ route('rekening.update', $item->id) }}" method="post">
                                    <div class="modal-body">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Kode Customer</label>
                                            <input type="text" class="form-control" name="kode" value="{{ $item->kode_customer }}" id="exampleFormControlInput1" required readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Rekening</label>
                                            <input type="text" class="form-control" value="{{ $item->rekening }}" name="rekening" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">No Rekening</label>
                                            <input type="number" value="{{ $item->no_rekening }}" class="form-control" name="no_rekening" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Nama Rekening</label>
                                            <input type="text" class="form-control" name="nama_rekening" value="{{ $item->nama_rekening }}" required>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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

