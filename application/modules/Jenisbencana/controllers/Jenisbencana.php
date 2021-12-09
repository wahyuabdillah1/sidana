<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use \PhpOffice\PhpSpreadsheet\IOFactory;

class Jenisbencana extends CI_Controller {

    public function __construct(){
        parent::__construct();
        //cara load model
        $this->load->model('Jenisbencana_model');
    }

	public function index()
	{
        $this->db->select('*');
        $this->db->from('jenis_bencana');


        $keyword=$this->input->get('keyword');
        if($keyword)
        {
            $this->db->like('jenis_bencana',$keyword);
        }
        $data['jenis_bencana']= $this->db->get();
        $this->template->load('admin/template','index',$data);
        //$this->load->view('user/index');
	}

    public function create()
	{
        $this->load->library('form_validation');
        $this->template->load('admin/template','create');
	}

    public function save()
	{
        //load library validation
        $this->load->library('form_validation');

        

        //set rules
        $this->form_validation->set_rules('jenis','Jenis','required');
        

        //check kondisi
        if($this->form_validation->run()==FALSE)
        {
            $this->template->load('admin/template','Jenisbencana');
        }

        else {
            
        $jenis= $this->input->post('jenis');
        $this->db->insert('jenis_bencana',array('jenis_bencana'=>$jenis));
        redirect('Jenisbencana');
        }
    
    }

    public function update()
    {
 //load library validation
    $this->load->library('form_validation');

    //set rules
    $this->form_validation->set_rules('jenis','Jenis','required');
    
    $id     =$this->input->post('id');
    $jenis  =$this->input->post('jenis');


    //check kondisi
    if($this->form_validation->run()==FALSE)
    {
        $this->db->where('id',$id);
        $data['jenis_bencana']=$this->db->get('jenis_bencana')->row_array();
        $this->template->load('admin/template','index',$data);
    }

    else{
        $this->db->where('id',$id);
        $this->db->set('jenis_bencana',$jenis);

        $this->db->update('jenis_bencana');
        redirect('Jenisbencana');
    }


}
    
        public function edit($id)
        {
            $this->db->where('id',$id);
            $data['jenis_bencana']=$this->db->get('jenis_bencana')->row_array();
            $this->template->load('admin/template','edit',$data);
        }

        public function delete($id)
        {

            $this->db->where('id',$id);
            $this->db->delete('jenis_bencana');
            redirect('Jenisbencana');
        }

        public function pdf()
        {
            $this->load->library('pdf');
            $pdf = new FPDF();
            $pdf->AddPage();
            $pdf->image('https://cdn.bmkg.go.id/Web/Logo-BMKG-new.png',20,6,20);

           
            $pdf->SetFont('Arial','B',20);
            $pdf->Cell(50,20,'',0,0);
            $pdf->Cell(50,20,'LAPORAN DATA JENIS BENCANA',0,1);
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(50,10,'',0,1);

            $pdf->Cell(40,6,'Nomor',1);
            $pdf->Cell(70,6,'id',1);
            $pdf->Cell(80,6,'Jenis Bencana',1,1);

            $pdf->SetFont('Arial','',10);
            //query
            $jenis= $this->Jenisbencana_model->getAll();
            $nomor=1;
            foreach($jenis->result() as $jenis){
            $pdf->Cell(40,6,$nomor,1);
            $pdf->Cell(70,6,$jenis->id,1);
            $pdf->Cell(80,6,$jenis->jenis_bencana,1,1);
            $nomor++;
            
        }
            $pdf->Output();
            
        

        }


        public function excel(){
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            //header dari kolom
            $sheet->setCellValue('A1', 'Nomor');
            $sheet->setCellValue('B1', 'Id');
            $sheet->setCellValue('C1', 'Jenis Bencana');

            //load dari database
            $this->load->model('jenisbencana_model');
            $jenis=$this->jenisbencana_model->getAll();
            $nomor=1;
            $row=2;
            foreach($jenis->result() as $jenis){
                //menampilkan data dari database
                $sheet->setCellValue('A'.$row, $nomor);
                $sheet->setCellValue('B'.$row, $jenis->id);
                $sheet->setCellValue('C'.$row, $jenis->jenis_bencana);
                $nomor++;
                $row++;
            }

            $writer = new Xlsx($spreadsheet);
            //setting output nama file
            $file_name='laporan-jenis-bencana.xlsx';
            $writer->save($file_name);
            $this->load->helper('download');
            force_download($file_name,null);
            //$writer->save('hello world.xlsx');
        }
      
	

}
