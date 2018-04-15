<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Staff extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Staff_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index() {
        $this->load->view('staff/staff_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Staff_model->json();
    }

    public function read($id) {
        $row = $this->Staff_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'staff_id' => $row->staff_id,
        		'staff_nama' => $row->staff_nama,
        		'staff_tplahir' => $row->staff_tplahir,
        		'staff_tglahir' => $row->staff_tglahir,
        		'staff_jenkel' => $row->staff_jenkel,
        		'staff_alamat' => $row->staff_alamat,
        		'staff_email' => $row->staff_email,
        		'staff_telpon' => $row->staff_telpon,
        		'reg_id' => $row->reg_id,
        		'user_id' => $row->user_id,
    	    );
            $this->load->view('staff/staff_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('staff'));
        }
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('staff/create_action'),
    	    'staff_id' => set_value('staff_id'),
    	    'staff_nama' => set_value('staff_nama'),
    	    'staff_tplahir' => set_value('staff_tplahir'),
    	    'staff_tglahir' => set_value('staff_tglahir'),
    	    'staff_jenkel' => set_value('staff_jenkel'),
    	    'staff_alamat' => set_value('staff_alamat'),
    	    'staff_email' => set_value('staff_email'),
    	    'staff_telpon' => set_value('staff_telpon'),
    	    'reg_id' => set_value('reg_id'),
    	    'user_id' => set_value('user_id'),
    	);
        $this->load->view('staff/staff_form', $data);
    }
    
    public function create_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'staff_id' => $this->input->post('staff_id',TRUE),
        		'staff_nama' => $this->input->post('staff_nama',TRUE),
        		'staff_tplahir' => $this->input->post('staff_tplahir',TRUE),
        		'staff_tglahir' => $this->input->post('staff_tglahir',TRUE),
        		'staff_jenkel' => $this->input->post('staff_jenkel',TRUE),
        		'staff_alamat' => $this->input->post('staff_alamat',TRUE),
        		'staff_email' => $this->input->post('staff_email',TRUE),
        		'staff_telpon' => $this->input->post('staff_telpon',TRUE),
        		'reg_id' => $this->input->post('reg_id',TRUE),
        		'user_id' => $this->input->post('user_id',TRUE),
        	    );

            $this->Staff_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('staff'));
        }
    }
    
    public function update($id) {
        $row = $this->Staff_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('staff/update_action'),
            	'staff_id' => set_value('staff_id', $row->staff_id),
            	'staff_nama' => set_value('staff_nama', $row->staff_nama),
            	'staff_tplahir' => set_value('staff_tplahir', $row->staff_tplahir),
            	'staff_tglahir' => set_value('staff_tglahir', $row->staff_tglahir),
            	'staff_jenkel' => set_value('staff_jenkel', $row->staff_jenkel),
            	'staff_alamat' => set_value('staff_alamat', $row->staff_alamat),
            	'staff_email' => set_value('staff_email', $row->staff_email),
            	'staff_telpon' => set_value('staff_telpon', $row->staff_telpon),
            	'reg_id' => set_value('reg_id', $row->reg_id),
            	'user_id' => set_value('user_id', $row->user_id),
                );
            $this->load->view('staff/staff_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('staff'));
        }
    }
    
    public function update_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('staff_id', TRUE));
        } else {
            $data = array(
                'staff_id' => $this->input->post('staff_id',TRUE),
        		'staff_nama' => $this->input->post('staff_nama',TRUE),
        		'staff_tplahir' => $this->input->post('staff_tplahir',TRUE),
        		'staff_tglahir' => $this->input->post('staff_tglahir',TRUE),
        		'staff_jenkel' => $this->input->post('staff_jenkel',TRUE),
        		'staff_alamat' => $this->input->post('staff_alamat',TRUE),
        		'staff_email' => $this->input->post('staff_email',TRUE),
        		'staff_telpon' => $this->input->post('staff_telpon',TRUE),
        		'reg_id' => $this->input->post('reg_id',TRUE),
        		'user_id' => $this->input->post('user_id',TRUE),
    	    );

            $this->Staff_model->update($this->input->post('staff_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('staff'));
        }
    }
    
    public function delete($id) {
        $row = $this->Staff_model->get_by_id($id);

        if ($row) {
            $this->Staff_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('staff'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('staff'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('staff_id', 'staff id', 'trim|required');
    	$this->form_validation->set_rules('staff_nama', 'staff nama', 'trim|required');
    	$this->form_validation->set_rules('staff_tplahir', 'staff tplahir', 'trim|required');
    	$this->form_validation->set_rules('staff_tglahir', 'staff tglahir', 'trim|required');
    	$this->form_validation->set_rules('staff_jenkel', 'staff jenkel', 'trim|required');
    	$this->form_validation->set_rules('staff_alamat', 'staff alamat', 'trim|required');
    	$this->form_validation->set_rules('staff_email', 'staff email', 'trim|required');
    	$this->form_validation->set_rules('staff_telpon', 'staff telpon', 'trim|required');
    	$this->form_validation->set_rules('reg_id', 'reg id', 'trim|required');
    	$this->form_validation->set_rules('user_id', 'user id', 'trim|required');

    	$this->form_validation->set_rules('staff_id', 'staff_id', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel() {
        $this->load->helper('exportexcel');
        $namaFile = "staff.xls";
        $judul = "staff";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Staff Id");
    	xlsWriteLabel($tablehead, $kolomhead++, "Staff Nama");
    	xlsWriteLabel($tablehead, $kolomhead++, "Staff Tplahir");
    	xlsWriteLabel($tablehead, $kolomhead++, "Staff Tglahir");
    	xlsWriteLabel($tablehead, $kolomhead++, "Staff Jenkel");
    	xlsWriteLabel($tablehead, $kolomhead++, "Staff Alamat");
    	xlsWriteLabel($tablehead, $kolomhead++, "Staff Email");
    	xlsWriteLabel($tablehead, $kolomhead++, "Staff Telpon");
    	xlsWriteLabel($tablehead, $kolomhead++, "Reg Id");
    	xlsWriteLabel($tablehead, $kolomhead++, "User Id");

	foreach ($this->Staff_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->staff_id);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->staff_nama);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->staff_tplahir);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->staff_tglahir);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->staff_jenkel);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->staff_alamat);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->staff_email);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->staff_telpon);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->reg_id);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->user_id);

    	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word() {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=staff.doc");

        $data = array(
            'staff_data' => $this->Staff_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('staff/staff_doc',$data);
    }

}

/* End of file Staff.php */
/* Location: ./application/controllers/Staff.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-15 05:05:51 */
/* http://harviacode.com */