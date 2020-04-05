<?php

class Cities extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cities_model');       
    }

    public function list(){
        $records = $this->cities_model->get_list();
        
        $viewData = ['cities' => $records];
        $this->load->helper('url');
        $this->load->view('cities/list',$viewData);     
    }

    public function delete($id = NULL)
    {
        if ($id == NULL) {
            echo('City doesn not exist in the database');
        }

        $record = $this->cities_model->select_by_id($id);

        if($record == NULL){
            show_error('This city does not exist in the database');
        }

        $this->load->helper('url');

        if($this->cities_model->delete($id)){
            redirect(base_url('cities/list'));
        }
        else{
            show_error('Could not delete record');
        }
    }

    public function add()
    {
        $this->load->helper('url');

        if($this->input->post('submit')){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name', 'Név', 'required');
            $this->form_validation->set_rules('postal_code', 'Irányítószám', 'required');

            if($this->form_validation->run() == TRUE){
                if($this->cities_model->add($this->input->post('name'), $this->input->post('postal_code'))){}
                redirect(base_url('cities/list')); 
            }
        }
        
        $this->load->helper('form');
        $this->load->view('cities/add');
    }

    public function edit($id = NULL)
    {
        if($id == NULL){
            show_error('ID missing');
        }

        $record = $this->cities_model->select_by_id($id);

        if($record == NULL){
            show_error('This city does not exist in the database');
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Város', 'required');
        $this->form_validation->set_rules('postal_code', 'Irányítószám', 'required');

        if($this->form_validation->run() == TRUE){
            $this->cities_model->edit($id, $this->input->post('name'), $this->input->post('postal_code'));
            
            $this->load->helper('url');
            redirect(base_url('cities/list')); 
        }

        else
        {
            $view_params = ['cty' => $record];

            $this->load->helper('form');
            $this->load->view('cities/edit', $view_params);
        }
    }
}