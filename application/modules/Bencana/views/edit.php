<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Data Jenis Bencana</h1>
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
                <h6 class="m-0 font-weight-bold text-primary">Edit data</h6>
                
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <?= validation_errors();?>
                <?php
                echo form_open('bencana/update');
                ?>
                <input type="hidden" name="id" value="<?=$bencana['ID'];?>"/>
                <table class="table table-bordered">
                <td>Data Bencana</td>
                        <td>
                            <?php
                            $judul_txt =[
                                'name'=>'judul',
                                'type'=>'text',
                                'class'=>'form-control',
                                'placeholder'=>'Masukan Judul Bencana',
                                'required'=>'required',
                                'value'=>$bencana['judul_bencana'],
                            ];
                            echo form_input($judul_txt);
                            ?>
                          <?= form_error('judul');?>
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td>
                        <?php
                            $tanggal_txt =[
                                'name'=>'tanggal',
                                'type'=>'date',
                                'class'=>'form-control form control-user',
                                'placeholder'=>'Masukkan Tanggal',
                                'required'=>'required',
                                'value'=>$bencana['tanggal_kejadian'],
                            ];
                            echo form_input($tanggal_txt);
                            ?>
                            <?=form_error('tanggal');?>
                        </td>
                    </tr>
                    <tr>
                        <td>Lokasi</td>
                        <td>
                        <?php
                            $lokasi_txt =[
                                'name'=>'lokasi',
                                'type'=>'text',
                                'class'=>'form-control form-control-user',
                                'placeholder'=>'Tulis Lokasi Bencana',
                                'required'=>'required',
                                'value'=>$bencana['alamat'],
                            ];
                            echo form_input($lokasi_txt);
                            ?>
                            <?= form_error('lokasi');?>
                        </td>
                    </tr>
                    <tr>
                        <td>Latitude</td>
                        <td>
                        <?php
                            $lat_txt =[
                                'name'=>'lat',
                                'type'=>'text',
                                'class'=>'form-control form control-user',
                                'placeholder'=>'latitude',
                                'required'=>'required',
                                'value'=>$bencana['latitude'],
                            ];
                            echo form_input($lat_txt);
                            ?>
                            <?=form_error('lat');?>
                        </td>
                    </tr>
                    <tr>
                        <td>Longitude</td>
                        <td>
                        <?php
                            $long_txt =[
                                'name'=>'long',
                                'type'=>'text',
                                'class'=>'form-control form control-user',
                                'placeholder'=>'longitude',
                                'required'=>'required',
                                'value'=>$bencana['longitude'],
                            ];
                            echo form_input($long_txt);
                            ?>
                            <?=form_error('long');?>
                        </td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td>
                        <?php
                            $deskripsi_txt =[
                                'name'=>'deskripsi',
                                'type'=>'text',
                                'class'=>'form-control form control-user',
                                'placeholder'=>'Deskripsi Bencana',
                                'required'=>'required',
                                'value'=>$bencana['deskripsi_bencana'],
                            ];
                            echo form_input($deskripsi_txt);
                            ?>
                            <?=form_error('deskripsi');?>
                        </td>
                    </tr>

                    <tr>
                        <td>Jenis Bencana</td>
                        <td>
                        <?php echo form_dropdown('jenis', $jenis_bencana, set_value('jenis')); ?>                   
                        <?=form_error('jenis');?>
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                       <?php echo form_submit('simpan','Simpan Data', ['class'=>'btn btn-primary'])?>
                        <a href="<?= base_url()?>bencana" class="btn btn-primary">Kembali</a>
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