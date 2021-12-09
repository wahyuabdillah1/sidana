<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Sidanaapi extends RestController {

	public function __construct(){
		parent::__construct();
		//cara load model
		$this->load->model('Buku_model');
	}

	public function index_get()
	{
       $bencana =$this->Buku_model->getAll()->result();
	   $this->response($bencana, 200);
	}


	public function index_post()
	{
        $judul   =$this->input->post('judul');
        $tanggal   =$this->input->post('tanggal');
        $lokasi  =$this->input->post('lokasi');
        $lat   =$this->input->post('lat');
        $long   =$this->input->post('long');
        $deskripsi   =$this->input->post('deskripsi');
        $jenis_bencana   =$this->input->post('jenis');
		
	   if($judul==''){
			$response = ['message'=>'judul tidak boleh kososng','success'=>false];
			$this->response($response, 201);
		}

		if($tanggal==''){
			$response = ['message'=>'tanggal tidak boleh kososng','success'=>false];
			$this->response($response, 201);
		}

		if($lokasi==''){
			$response = ['message'=>'lokasi tidak boleh kososng','success'=>false];
			$this->response($response, 201);
		}

		if($lat==''){
			$response = ['message'=>'latitude tidak boleh kososng','success'=>false];
			$this->response($response, 201);
		}
		if($long==''){
			$response = ['message'=>'longitude tidak boleh kososng','success'=>false];
			$this->response($response, 201);
		}
		if($deskripsi==''){
			$response = ['message'=>'deskripsi tidak boleh kososng','success'=>false];
			$this->response($response, 201);
		}
		if($jenis_bencana==''){
			$response = ['message'=>'jenis bencana tidak boleh kososng','success'=>false];
			$this->response($response, 201);
		}
		
	   $data =[
		   'judul_bencana' => $judul,
		   'tanggal_kejadian' => $tanggal,
		   'alamat' => $lokasi,
		   'latitude' => $lat,
		   'longitude' => $long,
		   'deskripsi_bencana' => $deskripsi,
		   'jenis_bencana_id' => $jenis_bencana,
	   ];
	   $this->Buku_model->create($data);
	   $response = ['message'=>'berhasil menyimpan data','success'=>true];
	   $this->response($response, 201);
	}
	public function index_put()
	{
        $judul   =$this->put('judul');
        $tanggal   =$this->put('tanggal');
        $lokasi  =$this->put('lokasi');
        $lat   =$this->put('lat');
        $long   =$this->put('long');
        $deskripsi   =$this->put('deskripsi');
        $jenis_bencana   =$this->put('jenis');
	   	$id = $this->put('id');

		
		if($id==''){
			$response = ['message'=>'id tidak boleh kososng','success'=>false];
			$this->response($response, 201);
		}
		   if($judul==''){
			$response = ['message'=>'judul tidak boleh kososng','success'=>false];
			$this->response($response, 201);
		}

		if($tanggal==''){
			$response = ['message'=>'tanggal tidak boleh kososng','success'=>false];
			$this->response($response, 201);
		}

		if($lokasi==''){
			$response = ['message'=>'lokasi tidak boleh kososng','success'=>false];
			$this->response($response, 201);
		}

		if($lat==''){
			$response = ['message'=>'latitude tidak boleh kososng','success'=>false];
			$this->response($response, 201);
		}
		if($long==''){
			$response = ['message'=>'longitude tidak boleh kososng','success'=>false];
			$this->response($response, 201);
		}
		if($deskripsi==''){
			$response = ['message'=>'deskripsi tidak boleh kososng','success'=>false];
			$this->response($response, 201);
		}
		if($jenis_bencana==''){
			$response = ['message'=>'jenis bencana tidak boleh kososng','success'=>false];
			$this->response($response, 201);
		}
	   $data =[
		'judul_bencana' => $judul,
		'tanggal_kejadian' => $tanggal,
		'alamat' => $lokasi,
		'latitude' => $lat,
		'longitude' => $long,
		'deskripsi_bencana' => $deskripsi,
		'jenis_bencana_id' => $jenis_bencana,
	   ];
	   $this->Buku_model->update($id,$data);
	   $response = ['message'=>'berhasil megupdate data','success'=>true];
	   $this->response($response, 201);
	}
	public function index_delete()
	{
      $id= $this->delete('id');
	  if($id==''){
		$response = ['message'=>'id tidak boleh kososng','success'=>false];
		$this->response($response, 201);
	}
	  $this->Buku_model->delete($id);
	  $response = ['message'=>'berhasil meghapus data','success'=>true];
	  $this->response($response, 201);
		}

}
