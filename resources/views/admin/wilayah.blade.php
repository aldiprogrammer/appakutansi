@extends('template.layout-admin')
    @section('content')
        <div class="container">
            <div class="recentCustomers">
                <div class="cardHeader">
                    <div class="d-flex justify-content-between">
                        <h2>Halaman Wilayah</h2>
                        <button class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class="fas fa-plus"></i>Tambah Wilayah</button>


                    </div>
                    <table class="table table-striped mt-5">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Wilayah</th>
                                <th scope="col">Opsi</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Wilayah</td>
                                <td>Opsi</td>
                            </tr>
                            
                        </tbody>
                    </table>

                </div>

                
               
            </div>

        </div>

       <!-- Modal -->
       <div class="modal fade" id="exampleModal" tabindex="-0" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog">
               <div class="modal-content">
                   <div class="modal-header">
                       <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                   </div>
                   <div class="modal-body">
                       ...
                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                       <button type="button" class="btn btn-primary">Save changes</button>
                   </div>
               </div>
           </div>
       </div>


    @endsection



