<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('user/user_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->User_model->json();
    }

    public function read($id) 
    {
        $row = $this->User_model->get_by_id($id);
        if ($row) {
            $data = array(
		'user_id' => $row->user_id,
		'user_nama' => $row->user_nama,
		'user_level' => $row->user_level,
		'user_inisial' => $row->user_inisial,
		'user_kunci' => $row->user_kunci,
		'user_aktif' => $row->user_aktif,
	    );
            $this->load->view('user/user_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('user/create_action'),
	    'user_id' => set_value('user_id'),
	    'user_nama' => set_value('user_nama'),
	    'user_level' => set_value('user_level'),
	    'user_inisial' => set_value('user_inisial'),
	    'user_kunci' => set_value('user_kunci'),
	    'user_aktif' => set_value('user_aktif'),
	);
        $this->load->view('user/user_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'user_nama' => $this->input->post('user_nama',TRUE),
		'user_level' => $this->input->post('user_level',TRUE),
		'user_inisial' => $this->input->post('user_inisial',TRUE),
		'user_kunci' => md5($this->input->post('user_kunci',TRUE)),
		'user_aktif' => $this->input->post('user_aktif',TRUE),
	    );

            $this->User_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('user'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('user/update_action'),
		'user_id' => set_value('user_id', $row->user_id),
		'user_nama' => set_value('user_nama', $row->user_nama),
		'user_level' => set_value('user_level', $row->user_level),
		'user_inisial' => set_value('user_inisial', $row->user_inisial),
		'user_kunci' => set_value('user_kunci', $row->user_kunci),
		'user_aktif' => set_value('user_aktif', $row->user_aktif),
	    );
            $this->load->view('user/user_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('user_id', TRUE));
        } else {
            $data = array(
		'user_nama' => $this->input->post('user_nama',TRUE),
		'user_level' => $this->input->post('user_level',TRUE),
		'user_inisial' => $this->input->post('user_inisial',TRUE),
		'user_kunci' => md5($this->input->post('user_kunci',TRUE)),
		'user_aktif' => $this->input->post('user_aktif',TRUE),
	    );

            $this->User_model->update($this->input->post('user_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('user'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $this->User_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('user_nama', 'user nama', 'trim|required');
	$this->form_validation->set_rules('user_level', 'user level', 'trim|required');
	$this->form_validation->set_rules('user_inisial', 'user inisial', 'trim|required');
	$this->form_validation->set_rules('user_kunci', 'user kunci', 'trim|required');
	$this->form_validation->set_rules('user_aktif', 'user aktif', 'trim|required');

	$this->form_validation->set_rules('user_id', 'user_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "user.xls";
        $judul = "user";
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
	xlsWriteLabel($tablehead, $kolomhead++, "User Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "User Level");
	xlsWriteLabel($tablehead, $kolomhead++, "User Inisial");
	xlsWriteLabel($tablehead, $kolomhead++, "User Kunci");
	xlsWriteLabel($tablehead, $kolomhead++, "User Aktif");

	foreach ($this->User_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->user_nama);
	    xlsWriteNumber($tablebody, $kolombody++, $data->user_level);
	    xlsWriteLabel($tablebody, $kolombody++, $data->user_inisial);
	    xlsWriteLabel($tablebody, $kolombody++, $data->user_kunci);
	    xlsWriteLabel($tablebody, $kolombody++, $data->user_aktif);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=user.doc");

        $data = array(
            'user_data' => $this->User_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('user/user_doc',$data);
    }

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-15 04:53:42 */
/* http://harviacode.com */