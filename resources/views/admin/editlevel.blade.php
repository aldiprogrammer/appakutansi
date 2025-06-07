@extends('template.layout-admin')
@section('content')
<div class="container">
    <div class="recentCustomers">
        <div class="cardHeader">
            <div class="d-flex justify-content-between">
                <h2>Halaman {{ $data['title'] }}</h2>
                <hr>


            </div>
            @php
            $aksesAktifList = $data['level']->akses->pluck('akses')->toArray();
            @endphp

            <div class="mt-4">
                <div class="row">
                    <form action="{{ route('level.update', $data['level']->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="col-sm-6">
                            <div class="mb-3 row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Level</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="level" value="{{ $data['level']->level }}" required>
                                </div>
                            </div>

                            {{-- {{ $data['level']->akses }} --}}

                            <div class="mb-3 row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Akses</label>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" {{ in_array('customer', $aksesAktifList) ? 'checked' : '' }} id="inlineCheckbox1" name="akses[]" value="customer">


                                        <label class="form-check-label" for="inlineCheckbox1">Customer</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="akses[]" {{ in_array('user', $aksesAktifList) ? 'checked' : '' }} value="user">


                                        <label class="form-check-label" for="inlineCheckbox2">User</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox6" {{ in_array('level', $aksesAktifList) ? 'checked' : '' }} name="akses[]" value="level">


                                        <label class="form-check-label" for="inlineCheckbox6">Level</label>
                                    </div>


                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="akses[]" {{ in_array('produk', $aksesAktifList) ? 'checked' : '' }} value="produk">

                                        <label class="form-check-label" for="inlineCheckbox3">Produk</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox4" name="akses[]" {{ in_array('store', $aksesAktifList) ? 'checked' : '' }} value="store">


                                        <label class="form-check-label" for="inlineCheckbox4">Store</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox5" name="akses[]" {{ in_array('transaksi', $aksesAktifList) ? 'checked' : '' }} value="transaksi">


                                        <label class="form-check-label" for="inlineCheckbox5">Transaksi</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox6" name="akses[]" {{ in_array('cost', $aksesAktifList) ? 'checked' : '' }} value="cost">


                                        <label class="form-check-label" for="inlineCheckbox6">Cost</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox6" name="akses[]" value="proses" {{ in_array('proses', $aksesAktifList) ? 'checked' : '' }}>


                                        <label class="form-check-label" for="inlineCheckbox6">Proses</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox6" name="akses[]" value="transper" {{ in_array('transfer', $aksesAktifList) ? 'checked' : '' }}>

                                        <label class="form-check-label" for="inlineCheckbox6">Transper</label>
                                    </div>

                                </div>
                                <div class="mt-3 row">
                                    <button class="btn btn-primary" type="submit"><i class="fas fa-pen"></i> Edit level</button>
                                </div>
                            </div>


                        </div>

                    </form>

                </div>

            </div>



        </div>



    </div>

</div>
@endsection

