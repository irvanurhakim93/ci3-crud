<?php 

class Crud extends CI_Controller
{

    
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        
        $this->load->model("Murid_model");
    }

    public function index() {
        $data['murid'] = $this->Murid_model->get_all();
        $this->load->view('hello',$data);
    }

    public function create() {
        $this->load->view('create');
    }

    public function store(){
        // $this->form_validation->set_rules('nama', 'Nama','required');
        // $this->form_validation->set_rules('kelas', 'Kelas','required');
     
        if (!$this->form_validation->run() == true)
        {
            $data['nama'] = $this->input->post('nama');
            $data['kelas'] = $this->input->post('kelas');
            $this->Murid_model->store($data);
            $this->load->view('hello');
        }
        else
        { 
            $this->load->view('create');
        }
     
    }

    public function edit($id) 
    {
        $data['murid'] = $this->Murid_model->get($id);
        $this->load->view('edit',$data);    
    }

    public function update()
    {
    // $this->form_validation->set_rules('nama', 'inputnama', 'required');
    // $this->form_validation->set_rules('kelas', 'inputkelas', 'required');
 
    if (!$this->form_validation->run() == true)
    {
        $idmurid = $this->input->post('id');
        $data['nama'] = $this->input->post('nama');
        $data['kelas'] = $this->input->post('kelas');
        $this->Murid_model->update($idmurid,$data);
        $this->load->view('hello');
    }
    else
    {
        $this->load->view('index.php/crud/create');
    }
    }

    public function destroy($id) {
        $deleteable = $this->Murid_model->delete($id);
        $this->load->view('hello');
    }

    public function printpdf() 
    {
        $data['murid'] = $this->Murid_model->get_all();   
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "data_murid.pdf";
        $this->pdf->load_view('pdfexample',$data);

    }

}