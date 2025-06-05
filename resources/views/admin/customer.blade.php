@extends('template.layout-admin')
@section('content')
    <div class="container">
        <div class="recentCustomers">
            <div class="cardHeader">
                <div class="d-flex justify-content-between">
                    <h2>Halaman {{ $data['title'] }}</h2>
                    <div>
                        {{-- <a href="{{ route('pdfcustomer') }}" target="_blank" class="btn "><i class="fas fa-download"></i>
                            Download data customer</a> --}}
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
                                            <label class="form-label">Kode</label>
                                            <input type="text" class="form-control" name="kode"
                                                value="{{ $data['kode'] }}" readonly required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Owner</label>
                                            <input type="text" class="form-control" name="owner" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Whatsapp</label>
                                            <input type="number" class="form-control" name="wa" required>
                                            @error('wa')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Level</label>
                                            <select name="level" id="" class="form-control" required>
                                                <option value="">-- Pilih Level --</option>
                                                <option>Level 1</option>
                                                <option>Level 2</option>
                                                <option>Level 3</option>
                                                <option>Level 4</option>
                                                <option>Level 5</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Rekening</label>
                                            <input type="text" class="form-control" name="rekening" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">No Rekening</label>
                                            <input type="number" class= "form-control" name="no_rekening" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Nama Rekening</label>
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
                            <th scope="col">Owner</th>
                            <th scope="col">Whatsapp</th>
                            <th scope="col">Level</th>
                            <th scope="col">Rekening</th>
                            <th scope="col">No Rekening</th>
                            <th scope="col">Nama Rekening</th>
                            <th scope="col">Opsi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data['customer'] as $item)
                            @php
                                $rek = $item->rekening->where('status', 1)->first();
                            @endphp
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $item->owner }}</td>
                                <td>{{ $item->wa }}</td>
                                <td>{{ $item->level }}</td>
                                <td>{{ $rek->rekening }}</td>
                                <td>{{ $rek->no_rekening }}</td>
                                <td>{{ $rek->nama_rekening }}</td>
                                <td>
                                    <button id="hapus" class="btn btnhapus" data-id="{{ $item->id }}"
                                        data-url='hapuscustomer'><i class="fas fa-trash"></i></button>
                                    <button class="btn" data-bs-toggle="modal"
                                        data-bs-target="#exampleModaledit{{ $item->id }}"> <i
                                            class="fas fa-pen"></i></button>
                                    <a href="/rekening/{{ $item->kode }}" class="btn"> <i class="fas fa-user"></i></a>
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
                                                    <label class="form-label">Kode Customer</label>
                                                    <input type="text" class="form-control" value="{{ $item->kode }}" name="kode" readonly required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Owner</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $item->owner }}" name="owner" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Whatsapp</label>
                                                    <input type="number" class="form-control" name="wa"
                                                        value="{{ $item->wa }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Level</label>
                                                    <select name="level" id="" class="form-control" required>
                                                        <option>{{ $item->level }}</option>
                                                        <option>Level 1</option>
                                                        <option>Level 2</option>
                                                        <option>Level 3</option>
                                                        <option>Level 4</option>
                                                        <option>Level 5</option>
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Rekening</label>
                                                   <select name="rekening" id="" class="form-control">
                                                        <option>{{ $rek->rekening }}</option>
                                                        
                                                        @foreach ($item->rekening as $dd )
                                                            <option value="{{ $dd->id }}">{{ $dd->rekening }}</option>
                                                        @endforeach

                                                   </select>
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
