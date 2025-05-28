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
                            <form action="{{ route('transaksicost.create') }}" method="post">
                                <div class="modal-body">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Type of cost</label>
                                        <select name="id_cost"  class="form-control typecost" data-id="0">

                                            <option value="">-- Pilih Type Of Cost --</option>
                                            @foreach ($data['typecost'] as $item2 )
                                                <option value="{{ $item2->id }}">{{ $item2->type_of_cost }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Detail of cost</label>
                                        <input type="text" class="form-control" name="detail" id="detailcost" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Cost</label>
                                        <input type="number" class="form-control" name="cost" id="exampleFormControlInput1" required>
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
                        <th scope="col">Type of cost</th>
                        <th scope="col">Detai of cost</th>
                        <th scope="col">Cost</th>
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
                        <td>{{ $item->costTo->type_of_cost }}</td>
                        <td>{{ $item->costTo->detail_of_cost }}</td>
                        <td>{{ number_format($item->cost, '0', ',') }}</td>
                        <td>{{ $item->lokasi }}</td>
                        <td>
                            <button id="hapus" class="btn btnhapus" data-id="{{ $item->id }}" data-url='hapustransaksicost'><i class="fas fa-trash"></i></button>
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
                                <form action="{{ route('transaksicost.update', $item->id) }}" method="post">
                                    <div class="modal-body">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Type of cost</label>
                                            <select name="id_cost"  class="form-control typecost" data-id="{{ $item->id }}">
                                                <option value="{{ $item->id }}">{{ $item->costTo->type_of_cost }}</option>
                                                @foreach ($data['typecost'] as $item2 )
                                                <option value="{{ $item2->id }}">{{ $item2->type_of_cost }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Detail of cost</label>
                                            <input type="text" class="form-control editdetailcost" value="{{ $item->costTo->detail_of_cost }}" name="detail" id="" required>

                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Cost</label>
                                            <input type="number" class="form-control" value="{{ $item->cost }}" name="cost" id="exampleFormControlInput1" required>
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

