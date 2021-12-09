<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use \PhpOffice\PhpSpreadsheet\IOFactory;

class Bencana extends CI_Controller {

    public function __construct(){
        parent::__construct();
        //cara load model
        $this->load->model('Bencana_model');
    }

	public function index()
	{
        $keyword=$this->input->get('keyword');
        if($keyword)
        {
            $this->db->like('judul_bencana',$keyword);
        }
        $data['bencana']= $this->Bencana_model->getAll();
        $this->template->load('admin/template','index',$data);
        //$this->load->view('user/index');
	}

    public function create()
	{ $data["jenis_bencana"] = array(
        '-1'    => 'Pilih Jenis Bencana',
        '1'  => 'Meteorologi',
        '2'  => 'Banjir',
        '3'  => 'Kebakaran',
        '4' => 'Kekeringan',
      );
        $this->load->library('form_validation');
        $this->template->load('admin/template','create', $data);
	}

    public function save()
	{
        //load library validation
        $this->load->library('form_validation');

        

        //set rules
        $this->form_validation->set_rules('judul','Judul','required');
        $this->form_validation->set_rules('tanggal','Tanggal','required');
        $this->form_validation->set_rules('lokasi','Lokasi','required');
        $this->form_validation->set_rules('lat','Latitude','required');
        $this->form_validation->set_rules('long','Longitude','required');
        $this->form_validation->set_rules('deskripsi','Deskripsi','required');
        $this->form_validation->set_rules('jenis','Jenis','required');
        
        
        $judul   =$this->input->post('judul');
        $tanggal   =$this->input->post('tanggal');
        $lokasi  =$this->input->post('lokasi');
        $lat   =$this->input->post('lat');
        $long   =$this->input->post('long');
        $deskripsi   =$this->input->post('deskripsi');
        $jenis_bencana   =$this->input->post('jenis');
        

        //check kondisi
        if($this->form_validation->run()==FALSE)
        {
            $this->template->load('admin/template','bencana');
        }

        else {
            
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png'; 
        $this->load->library('upload', $config);
        $this->upload->do_upload('avatar');
        $upload=$this->upload->data();

        $avatar =$upload['file_name'];
       // $this->db->insert('user',array('name'=>$name, 'email'=>$email, 'password' => md5($password),'avatar'=>$avatar));
       
       $data =[
        'judul_bencana' => $judul,
        'tanggal_kejadian' => $tanggal,
        'alamat' => $lokasi,
        'latitude' => $lat,
        'longitude' => $long,
        'deskripsi_bencana' => $deskripsi,
        'jenis_bencana_id' => $jenis_bencana,
        'foto_bencana'=>$avatar,
       ];


      $this->Bencana_model->insert($data);
        redirect('bencana');
        }
    
    }

    public function update()
        {
     //load library validation
        $this->load->library('form_validation');

        //set rules
        $this->form_validation->set_rules('judul','Judul','required');
        $this->form_validation->set_rules('tanggal','Tanggal','required');
        $this->form_validation->set_rules('lokasi','Lokasi','required');
        $this->form_validation->set_rules('lat','Latitude','required');
        $this->form_validation->set_rules('long','Longitude','required');
        $this->form_validation->set_rules('deskripsi','Deskripsi','required');
        $this->form_validation->set_rules('jenis','Jenis','required');
        
        
        $id     =$this->input->post('id');
        $judul   =$this->input->post('judul');
        $tanggal   =$this->input->post('tanggal');
        $lokasi  =$this->input->post('lokasi');
        $lat   =$this->input->post('lat');
        $long   =$this->input->post('long');
        $deskripsi   =$this->input->post('deskripsi');
        $jenis_bencana   =$this->input->post('jenis');

        if($jenis_bencana>0)
            {
        $data =[
            'judul_bencana' => $judul,
            'tanggal_kejadian' => $tanggal,
            'alamat' => $lokasi,
            'latitude' => $lat,
            'longitude' => $long,
            'deskripsi_bencana' => $deskripsi,
            'jenis_bencana_id' => $jenis_bencana,
           ]; }

           else {
           $data =[
            'judul_bencana' => $judul,
            'tanggal_kejadian' => $tanggal,
            'alamat' => $lokasi,
            'latitude' => $lat,
            'longitude' => $long,
            'deskripsi_bencana' => $deskripsi,
           ];}

        //check kondisi
        if($this->form_validation->run()==FALSE)
        {
            $this->db->where('id',$id);
            $data['bencana']=$this->db->get('bencana')->row_array();
            $this->template->load('admin/template','bencana',$data);
        }

        else{

            
            $this->Bencana_model->update($id,$data);
            redirect('bencana');
        }


    }
    
        public function edit($ID)
        {
            $data["jenis_bencana"] = array(
                '-1'    => 'Pilih Jenis Bencana',
                '1'  => 'Meteorologi',
                '2'  => 'Banjir',
                '3'  => 'Kebakaran',
                '4' => 'Kekeringan',
              );
            $data['bencana']=$this->Bencana_model->edit($ID);
            $this->template->load('admin/template','edit',$data);
        }

        public function delete($ID)
        {
            $this->Bencana_model->delete($ID);
            redirect('bencana');
        }

        public function pdf()
        {
            $this->load->library('pdf');
            $pdf = new FPDF();
            $pdf->AddPage();
            $pdf->image('https://cdn.bmkg.go.id/Web/Logo-BMKG-new.png',20,6,20);

           
            $pdf->SetFont('Arial','B',20);
            $pdf->Cell(50,20,'',0,0);
            $pdf->Cell(50,20,'LAPORAN DATA BENCANA',0,1);
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(50,10,'',0,1);

            $pdf->Cell(10,6,'No',1);
            $pdf->Cell(50,6,'Judul',1);
            $pdf->Cell(25,6,'Tanggal',1);
            $pdf->Cell(25,6,'Lokasi',1);
           // $pdf->Cell(30,6,'Latitude',1);
            //$pdf->Cell(30,6,'Longitude',1);
            $pdf->Cell(30,6,'Jenis Bencana',1);
            $pdf->Cell(50,6,'Deskripsi',1,1);

            $pdf->SetFont('Arial','',10);
            //query
            $bencana= $this->Bencana_model->getAll();
            $nomor=1;
            foreach($bencana->result() as $bencana){
            $pdf->Cell(10,6,$nomor,1);
            $pdf->Cell(50,6,$bencana->judul_bencana,1);
            $pdf->Cell(25,6,$bencana->tanggal_kejadian,1);
           $pdf->Cell(25,6,$bencana->alamat,1);
            //$pdf->Cell(30,6,$bencana->latitude,1);
            //$pdf->Cell(30,6,$bencana->longitude,1);
            $pdf->Cell(30,6,$bencana->jenis_bencana,1);
            $pdf->Cell(50,6,$bencana->deskripsi_bencana,1,1);
            $nomor++;
            
        }
            $pdf->Output();
            
        

        }


        public function excel(){
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            //header dari kolom
            $sheet->setCellValue('A1', 'Nomor');
            $sheet->setCellValue('B1', 'Judul');
            $sheet->setCellValue('C1', 'Tanggal');
            $sheet->setCellValue('D1', 'Lokasi');
            $sheet->setCellValue('E1', 'Latitude');
            $sheet->setCellValue('F1', 'Longitude');
            $sheet->setCellValue('G1', 'Jenis Bencana');
            $sheet->setCellValue('H1', 'Deskripsi');

            //load dari database
            $this->load->model('bencana_model');
            $data=$this->bencana_model->getAll();
            $nomor=1;
            $row=2;
            foreach($data->result() as $data){
                //menampilkan data dari database
                $sheet->setCellValue('A'.$row, $nomor);
                $sheet->setCellValue('B'.$row, $data->judul_bencana);
                $sheet->setCellValue('C'.$row, $data->tanggal_kejadian);
                $sheet->setCellValue('D'.$row, $data->alamat);
                $sheet->setCellValue('E'.$row, $data->latitude);
                $sheet->setCellValue('F'.$row, $data->longitude);
                $sheet->setCellValue('G'.$row, $data->jenis_bencana);
                $sheet->setCellValue('H'.$row, $data->deskripsi_bencana);
                $nomor++;
                $row++;
            }

            $writer = new Xlsx($spreadsheet);
            //setting output nama file
            $file_name='laporan-data-bencana.xlsx';
            $writer->save($file_name);
            $this->load->helper('download');
            force_download($file_name,null);
            //$writer->save('hello world.xlsx');
        }

      
      
	

}
