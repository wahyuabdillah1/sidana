<div class="container-fluid">

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Lokasi Bencana Terkini</h6>
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
                <?php
                
                foreach ($lokasi as $row)
                 //echo $row['latitude'].', '.$row['longitude']
                
                //echo var_dump($lokasi);?>
               <!-- var locations = --> <?//=json_encode($locations);?><?php
               /* foreach ($lokasi as $row)
{
        echo $row['latitude'].',';
}*/
                ?>

                    <div id="map"></div>
<!--maps-->
    

<script src="<?= base_url(); ?>/assets/leaflet/leaflet.js"></script>
<script>
var token = "pk.eyJ1Ijoid2FoeXVhYmRpbGxhaCIsImEiOiJja3VxanZqajgwYWw1Mm5sMDBjODdmdnoxIn0.LCc_2rRXK9pARpDxn7AwjA";
var mymap = L.map('map').setView([-3.0513, 119.2268], 4); //makasar
<?php foreach ($lokasi as $row){?>
          var marker = L.marker([ <?= $row['latitude'].', '.$row['longitude']?>]).addTo(mymap);
          marker.bindPopup('<b><?= $row['alamat'].'-> '.$row['tanggal_kejadian'];?></b><?php 
                                echo "</br>"; 
                                echo 'latitude :'.$row['latitude'];
                                echo "</br>"; 
                                echo 'longitude :'.$row['longitude'];
                                echo "</br>"; 
                                echo 'Jenis Bencana :'.$row['jenis_bencana'];
                                echo "</br>"; 
                                echo 'Keterangan :'.$row['deskripsi_bencana'];
          ?></b>');
          <?php }?>


L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 8,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: token
}).addTo(mymap);
</script>
               
            </div>
        </div>
    </div>
</div>





</div>