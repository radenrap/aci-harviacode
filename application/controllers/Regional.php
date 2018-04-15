<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Regional extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Regional_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('regional/regional_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Regional_model->json();
    }

    public function read($id) 
    {
        $row = $this->Regional_model->get_by_id($id);
        if ($row) {
            $data = array(
		'reg_id' => $row->reg_id,
		'reg_nama' => $row->reg_nama,
		'user_id' => $row->user_id,
	    );
            $this->load->view('regional/regional_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('regional'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('regional/create_action'),
	    'reg_id' => set_value('reg_id'),
	    'reg_nama' => set_value('reg_nama'),
	    'user_id' => set_value('user_id'),
	);
        $this->load->view('regional/regional_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'reg_nama' => $this->input->post('reg_nama',TRUE),
		'user_id' => $this->input->post('user_id',TRUE),
	    );

            $this->Regional_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('regional'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Regional_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('regional/update_action'),
		'reg_id' => set_value('reg_id', $row->reg_id),
		'reg_nama' => set_value('reg_nama', $row->reg_nama),
		'user_id' => set_value('user_id', $row->user_id),
	    );
            $this->load->view('regional/regional_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('regional'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('reg_id', TRUE));
        } else {
            $data = array(
		'reg_nama' => $this->input->post('reg_nama',TRUE),
		'user_id' => $this->input->post('user_id',TRUE),
	    );

            $this->Regional_model->update($this->input->post('reg_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('regional'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Regional_model->get_by_id($id);

        if ($row) {
            $this->Regional_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('regional'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('regional'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('reg_nama', 'reg nama', 'trim|required');
	$this->form_validation->set_rules('user_id', 'user id', 'trim|required');

	$this->form_validation->set_rules('reg_id', 'reg_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "regional.xls";
        $judul = "regional";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Reg Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "User Id");

	foreach ($this->Regional_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->reg_nama);
	    xlsWriteNumber($tablebody, $kolombody++, $data->user_id);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=regional.doc");

        $data = array(
            'regional_data' => $this->Regional_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('regional/regional_doc',$data);
    }

}

/* End of file Regional.php */
/* Location: ./application/controllers/Regional.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-15 05:05:42 */
/* http://harviacode.com */