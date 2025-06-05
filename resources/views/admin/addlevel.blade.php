@extends('template.layout-admin')
@section('content')
<div class="container">
    <div class="recentCustomers">
        <div class="cardHeader">
            <div class="d-flex justify-content-between">
                <h2>Halaman {{ $data['title'] }}</h2>
                <hr>

                
            </div>

            <div class="mt-4">
                <div class="row">
                    <form action="{{ route('level.create') }}" method="post">
                        @csrf
                        <div class="col-sm-6">
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Level</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="level" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Akses</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="akses[]" value="customer">

                                    <label class="form-check-label" for="inlineCheckbox1">Customer</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="akses[]" value="user">

                                    <label class="form-check-label" for="inlineCheckbox2">User</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox6" name="akses[]" value="level">

                                    <label class="form-check-label" for="inlineCheckbox6">Level</label>
                                </div>


                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="akses[]" value="produk">
                                    <label class="form-check-label" for="inlineCheckbox3">Produk</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox4" name="akses[]" value="store">

                                    <label class="form-check-label" for="inlineCheckbox4">Store</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox5" name="akses[]" value="transaksi">

                                    <label class="form-check-label" for="inlineCheckbox5">Transaksi</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox6" name="akses[]" value="cost">

                                    <label class="form-check-label" for="inlineCheckbox6">Cost</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox6" name="akses[]" value="proses">

                                    <label class="form-check-label" for="inlineCheckbox6">Proses</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox6" name="akses[]" value="transper">
                                    <label class="form-check-label" for="inlineCheckbox6">Transper</label>
                                </div>

                            </div>
                            <div class="mt-3 row">
                                <button class="btn btn-primary" type="submit"><i class="fas fa-plus"></i> Tambah level</button>
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

