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
                                <form action="{{ route('user.create') }}" method="post">
                                    <div class="modal-body">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Username</label>
                                            <input type="text" class="form-control" name="username" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Lokasi</label>
                                            <select name="wilayah" id="" class="form-control">
                                                <option value="">-- Pilih Lokasi --</option>
                                                <option >All</option>
                                                <option>Medan</option>
                                                <option>Pekanbaru</option>
                                                <option>Surabaya</option>
                                                <option>Jakarta</option>
                                            </select>
                                        </div>

                                       
                                        <div class="mb-3">
                                            <label class="form-label">Level</label>
                                            <select name="id_level" id="" class="form-control">
                                                <option value="">-- Pilih Level User --</option>
                                                @foreach ($data['level'] as $lv)
                                                <option value="{{ $lv->id }}">{{ $lv->level }}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password" required>
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
                            <th scope="col">Username</th>
                            <th scope="col">Wilayah</th>
                            <th scope="col">Level</th>
                            <th scope="col">Opsi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data['user'] as $item)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->wilayah }}</td>
                                <td>{{ $item->level->level }}</td>
                                <td>
                                    <button id="hapus" class="btn btnhapus" data-id="{{ $item->id }}"
                                        data-url='hapususer'><i class="fas fa-trash"></i></button>
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
                                        <form action="{{ route('user.update', $item->id) }}" method="post">
                                            <div class="modal-body">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label class="form-label">Username</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $item->username }}" name="username" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Wilayah</label>
                                                    <select name="wilayah" id="" class="form-control">
                                                    <option value="{{ $item->wilayah }}">{{ $item->wilayah }}</option>
                                                    <option>All</option>
                                                    <option>Medan</option>
                                                    <option>Pekanbaru</option>
                                                    <option>Surabaya</option>
                                                    <option>Jakarta</option>
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Level</label>
                                                    <select name="level" id="" class="form-control">
                                                        <option value="{{ $item->id_level }}">{{ $item->level->level }}
                                                        </option>
                                                        @foreach ($data['level'] as $lv)
                                                            <option value="{{ $lv->id }}">{{ $lv->level }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Password</label>
                                                    <input type="password" class="form-control" name="password">
                                                    <small>Kosongkan password jika tidak ingin merubah password anda</small>

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
