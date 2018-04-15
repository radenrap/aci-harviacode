<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Town extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Town_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('town/town_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Town_model->json();
    }

    public function read($id) 
    {
        $row = $this->Town_model->get_by_id($id);
        if ($row) {
            $data = array(
		'town_id' => $row->town_id,
		'town_nama' => $row->town_nama,
		'town_paket' => $row->town_paket,
		'town_min' => $row->town_min,
		'town_tarif' => $row->town_tarif,
		'town_drop' => $row->town_drop,
		'reg_id' => $row->reg_id,
		'user_id' => $row->user_id,
	    );
            $this->load->view('town/town_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('town'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('town/create_action'),
	    'town_id' => set_value('town_id'),
	    'town_nama' => set_value('town_nama'),
	    'town_paket' => set_value('town_paket'),
	    'town_min' => set_value('town_min'),
	    'town_tarif' => set_value('town_tarif'),
	    'town_drop' => set_value('town_drop'),
	    'reg_id' => set_value('reg_id'),
	    'user_id' => set_value('user_id'),
	);
        $this->load->view('town/town_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'town_nama' => $this->input->post('town_nama',TRUE),
		'town_paket' => $this->input->post('town_paket',TRUE),
		'town_min' => $this->input->post('town_min',TRUE),
		'town_tarif' => $this->input->post('town_tarif',TRUE),
		'town_drop' => $this->input->post('town_drop',TRUE),
		'reg_id' => $this->input->post('reg_id',TRUE),
		'user_id' => $this->input->post('user_id',TRUE),
	    );

            $this->Town_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('town'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Town_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('town/update_action'),
		'town_id' => set_value('town_id', $row->town_id),
		'town_nama' => set_value('town_nama', $row->town_nama),
		'town_paket' => set_value('town_paket', $row->town_paket),
		'town_min' => set_value('town_min', $row->town_min),
		'town_tarif' => set_value('town_tarif', $row->town_tarif),
		'town_drop' => set_value('town_drop', $row->town_drop),
		'reg_id' => set_value('reg_id', $row->reg_id),
		'user_id' => set_value('user_id', $row->user_id),
	    );
            $this->load->view('town/town_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('town'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('town_id', TRUE));
        } else {
            $data = array(
		'town_nama' => $this->input->post('town_nama',TRUE),
		'town_paket' => $this->input->post('town_paket',TRUE),
		'town_min' => $this->input->post('town_min',TRUE),
		'town_tarif' => $this->input->post('town_tarif',TRUE),
		'town_drop' => $this->input->post('town_drop',TRUE),
		'reg_id' => $this->input->post('reg_id',TRUE),
		'user_id' => $this->input->post('user_id',TRUE),
	    );

            $this->Town_model->update($this->input->post('town_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('town'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Town_model->get_by_id($id);

        if ($row) {
            $this->Town_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('town'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('town'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('town_nama', 'town nama', 'trim|required');
	$this->form_validation->set_rules('town_paket', 'town paket', 'trim|required');
	$this->form_validation->set_rules('town_min', 'town min', 'trim|required');
	$this->form_validation->set_rules('town_tarif', 'town tarif', 'trim|required|numeric');
	$this->form_validation->set_rules('town_drop', 'town drop', 'trim|required');
	$this->form_validation->set_rules('reg_id', 'reg id', 'trim|required');
	$this->form_validation->set_rules('user_id', 'user id', 'trim|required');

	$this->form_validation->set_rules('town_id', 'town_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "town.xls";
        $judul = "town";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Town Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Town Paket");
	xlsWriteLabel($tablehead, $kolomhead++, "Town Min");
	xlsWriteLabel($tablehead, $kolomhead++, "Town Tarif");
	xlsWriteLabel($tablehead, $kolomhead++, "Town Drop");
	xlsWriteLabel($tablehead, $kolomhead++, "Reg Id");
	xlsWriteLabel($tablehead, $kolomhead++, "User Id");

	foreach ($this->Town_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->town_nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->town_paket);
	    xlsWriteLabel($tablebody, $kolombody++, $data->town_min);
	    xlsWriteNumber($tablebody, $kolombody++, $data->town_tarif);
	    xlsWriteLabel($tablebody, $kolombody++, $data->town_drop);
	    xlsWriteNumber($tablebody, $kolombody++, $data->reg_id);
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
        header("Content-Disposition: attachment;Filename=town.doc");

        $data = array(
            'town_data' => $this->Town_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('town/town_doc',$data);
    }

}

/* End of file Town.php */
/* Location: ./application/controllers/Town.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-11 11:52:46 */
/* http://harviacode.com */