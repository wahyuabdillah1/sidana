<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kelola Data Pengguna</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<!-- Content Row -->


<!-- Content Row -->

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Jenis Bencana</h6>
                
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <?= validation_errors();?>
                <?php
                echo form_open_multipart('Jenisbencana/save');
                ?>
                <table class="table table-bordered">
                    <tr>
                        <td>Jenis Bencana</td>
                        <td>
                            <?php
                            $jenis_txt =[
                                'name'=>'jenis',
                                'type'=>'text',
                                'class'=>'form-control',
                                'placeholder'=>'Masukan Jenis Bencana',
                                'required'=>'required',
                                'value'=>set_value('jenis'),
                            ];
                            echo form_input($jenis_txt);
                            ?>
                          <?= form_error('Jenisbencana');?>
                        </td>
                    </tr>
                    
                        <td></td>
                        <td>
                       <?php echo form_submit('simpan','Simpan Data', ['class'=>'btn btn-primary'])?>
                        <a href="<?= base_url()?>Jenisbencana" class="btn btn-primary">Kembali</a>
                        </td>
                    </tr>
                </table>
                <?php echo form_close();?>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
   
</div>

<!-- Content Row -->


</div>