<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kelola Jenis Bencana</h1>
</div>

<!-- Content Row -->


<!-- Content Row -->

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Jenis Bencana</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <a href="<?= base_url()?>Jenisbencana/create" class="btn btn-danger btn-sm">Tambah Data</a>
                <a href="<?= base_url()?>Jenisbencana/pdf" class="btn btn-danger btn-sm">Laporan PDF</a>
                <a href="<?= base_url()?>Jenisbencana/excel" class="btn btn-danger btn-sm">Laporan Excel</a>

                
                <?php
                echo form_open('Jenisbencana',['method'=>'GET']);
                ?>
                <input type="text" name="keyword" placeholder="Cari Data" class="form-control"
                style="width:300px;float:right;margin-top:-30px;">
                <?=form_close();?>
                <hr>
             <div class="table-responsive">
                <table class="table table-bordered table-hover" id="example1" width="100%" cellspacing="5">
                <thead>  
                <tr>
                        <th>Nomor</th>
                        <th>id</th>
                        <th>Jenis Bencana</th>
                        <th width="160">Action</th>
                    </tr>
</thead>
                    <?php
                    $nomor=1;
                    foreach($jenis_bencana->result() as $j_bencana){
                        ?>
                    <tr>
                        <td><?= $nomor;?></td>    
                        <td><?= $j_bencana->id;?></td>
                        <td><?= $j_bencana->jenis_bencana;?></td>
                        
                        <td>
                        <a href="<?= base_url()?>Jenisbencana/edit/<?php echo $j_bencana->id?>" class="btn btn-danger btn-sm">Edit</a>
                        <a href="<?= base_url()?>Jenisbencana/delete/<?php echo $j_bencana->id?>" class="btn btn-success btn-sm">Delete</a>
                        </td>
                    </tr>
                    <?php $nomor++; }?>
                </table>
                    </div>
            </div>
        </div>
    </div>
</div>


                <?php
                echo form_open_multipart('user/upload');
                ?>

                <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-bordered">
                            <tr>
                                <td>Pilih File<td>
                                    <td><input type="file" name="file"></td>
                            </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                        </div>
                    </div>
                    </div>




</div>