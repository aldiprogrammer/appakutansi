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
                            <form action="{{ route('produk.create') }}" method="post">
                                <div class="modal-body">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Level</label>
                                        <select class="form-control" name="level" required>
                                            <option>Level 1</option>
                                            <option>Level 2</option>
                                            <option>Level 3</option>
                                            <option>Level 4</option>
                                            <option>Level 5</option>
                                        </select>
                                    </div>


                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Jual</label>
                                        <input type="text" class="form-control" name="jual" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Admin</label>
                                        <input type="number" class="form-control" name="admin1" required>
                                    </div>


                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Model</label>
                                        <input type="text" class="form-control" name="modal" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Admin</label>
                                        <input type="number" class="form-control" name="admin2" required>
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
            <table class="table  mt-5">
                <thead>
                    <tr>
                      
                        <th scope="col">Name</th>
                        <th scope="col">Level</th>
                        <th scope="col">Jual</th>
                        <th scope="col">Admin</th>
                        <th scope="col">Modal</th>
                        <th scope="col">Admin</th>
                        <th scope="col">Opsi</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                     @foreach($data['produk'] as $name => $items)
                     <tr>
                         <td colspan="5"><strong>{{ $name }}</strong></td>
                     </tr>

                     @foreach($items as $item)
                    <tr>
                        <td></td>
                        <td>{{ $item->level }}</td>
                        <td>{{ $item->jual }}</td>
                        <td>{{ number_format($item->admin1, 0, ',')  }}</td>
                        <td>{{ $item->modal }}</td>
                        <td>{{ number_format($item->admin2, 0, ',')  }}</td>
                        <td>
                            <button id="hapus" class="btn btnhapus" data-id="{{ $item->id }}" data-url='hapusproduk'><i class="fas fa-trash"></i></button>
                            <button class="btn" data-bs-toggle="modal" data-bs-target="#exampleModaledit{{ $item->id }}"> <i class="fas fa-pen"></i></button>
                        </td>
                    </tr>
                    @endforeach


                    <div class="modal fade" id="exampleModaledit{{ $item->id }}" tabindex="-0" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{ route('produk.update', $item->id) }}" method="post">
                                    <div class="modal-body">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Name</label>
                                            <input type="text" class="form-control" name="name" value="{{ $item->name }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Level</label>
                                            <select class="form-control" name="level" required>
                                                <option>{{ $item->level }}</option>
                                                <option>Level 1</option>
                                                <option>Level 2</option>
                                                <option>Level 3</option>
                                                <option>Level 4</option>
                                                <option>Level 5</option>

                                            </select>

                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Jual</label>
                                            <input type="text" class="form-control" name="jual" value="{{ $item->jual }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Admin</label>
                                            <input type="number" class="form-control" value="{{ $item->admin1 }}" name="admin1" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Model</label>
                                            <input type="text" class="form-control" name="modal" value="{{ $item->modal }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Admin</label>
                                            <input type="number" class="form-control" value="{{ $item->admin2 }}" name="admin2" required>
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

