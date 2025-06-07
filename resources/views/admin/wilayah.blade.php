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
                                <form action="{{ route('wilayah.create') }}" method="post">
                                    <div class="modal-body">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Lokasi</label>
                                            <input type="text" class="form-control" name="wilayah"
                                                id="exampleFormControlInput1" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Nama Investor</label>
                                            <input type="text" class="form-control" name="nama_investor" id="exampleFormControlInput1" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Investasi</label>
                                            <input type="number" step="any" class="form-control" name="investasi" id="exampleFormControlInput1" required>
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
                            <th scope="col">Lokasi</th>
                            <th scope="col">Nama Investor</th>
                            <th scope="col">Investasi</th>
                            <th scope="col">Presentasi</th>
                            <th scope="col">Opsi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                         @foreach($data['wilayah'] as $lokasi => $investors)
                         @php
                         $total_investasi = $investors->sum('investasi');
                         @endphp

                         @foreach($investors as $investor)
                         <tr>
                            <td>{{ $no++ }}</td>
                             <td>{{ $lokasi }}</td>
                             <td>{{ $investor->nama_investor }}</td>
                             <td>{{ number_format($investor->investasi, 0, ',', '.') }}</td>
                             <td>{{ number_format(($investor->investasi / $total_investasi) * 100, 2) }}%</td>
                             <td>
                                <button id="hapus" class="btn btnhapus" data-id="{{ $investor->id }}" data-url='hapuswilayah'><i class="fas fa-trash"></i></button>
                                <button class="btn" data-bs-toggle="modal" data-bs-target="#exampleModaledit{{ $investor->id }}"> <i class="fas fa-pen"></i></button>
                             </td>
                         </tr>

                         <div class="modal fade" id="exampleModaledit{{ $investor->id }}" tabindex="-0" aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                         <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
                                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                     </div>
                                     <form action="{{ route('wilayah.update', $investor->id) }}" method="post">
                                         <div class="modal-body">
                                             @csrf
                                             @method('PUT')
                                             <div class="mb-3">
                                                 <label for="exampleFormControlInput1" class="form-label">Store</label>
                                                 <input type="text" class="form-control" value="{{ $investor->wilayah }}" name="wilayah" id="exampleFormControlInput1" required>
                                             </div>
                                             <div class="mb-3">
                                                 <label for="exampleFormControlInput1" class="form-label">Nama Investor</label>
                                                 <input type="text" class="form-control" value="{{ $investor->nama_investor }}" name="nama_investor" id="exampleFormControlInput1" required>
                                             </div>

                                             <div class="mb-3">
                                                 <label for="exampleFormControlInput1" class="form-label">Investasi</label>
                                                 <input type="number" step="any" value="{{ $investor->investasi }}" class="form-control" name="investasi" id="exampleFormControlInput1" required>
                                             </div>


                                         </div>
                                         <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                             <button type="submit" class="btn btn-primary">Update</button>
                                         </div>
                                     </form>
                                 </div>
                             </div>

                         @endforeach
                         {{-- Baris total per lokasi --}}
                         <tr style="font-weight: bold; background-color: red; color: #fff">
                            <td></td>
                             <td>-</td>
                             <td>Total</td>
                             <td>{{ number_format($total_investasi, 0, ',', '.') }}</td>
                             <td>100.00%</td>
                             <td>-</td>
                         </tr>
                         @endforeach

                    </tbody>
                </table>

            </div>



        </div>

    </div>
@endsection
