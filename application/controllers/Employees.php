<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Employees
 *
 * @author akos4
 * 
 * adatbázisban hoz létre egy táblát amiben adatokat tárolunk majd.
 * a kontroller a kezelő funkciókat biztosít böngészőn keresztül
 */
class Employees extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        
        
        //employees model példányosítás lényegében
        
        $this->load->model('Employees_model');
        
        
    }







    public function list(){
        //echo "list";
        //van egy employees tábla
        //list hívása esetén listázzuk ki a tábla tartalmát
        $records = $this->Employees_model->get_list();
        
        //felhelyezek egy nézetet és odaadom a listát megjeleníteni
        $view_data = ['employees' => $records];
        $this->load->helper('url');
        $this->load->view('employees/list', $view_data);
    }

    public function profile($id = NULL)
    {
        if($id == NULL){
            show_error('No ID');
        }

        $record = $this->Employees_model->select_by_id($id);

        if($record == NULL){
            show_error('No record with this ID');
        }

        $view_params = ['emp' => $record];

        $this->load->helper('form');
        $this->load->view('employees/profile', $view_params);
    }





    
    public function add(){
        //megnézem hogy most nyitotta meg a user az oldalt, vagy mr beküldi az adatot
        $this->load->helper('url');
        //input->get és input->post al letudom kérdezni a form tartalmát paraméterrel
        if($this->input->post('submit')){
            //input validáció
            $this->load->library('form_validation');
            //----validációs szabályok majd ide, setrules-al-----
            //p1: mezőnév, p2: mező display címke, p3: validációs szabály neve
            $this->form_validation->set_rules('name', 'Név', 'required');
            $this->form_validation->set_rules('ssn', 'SSN', 'required');
            $this->form_validation->set_rules('tin', 'TIN', 'required');
            if($this->form_validation->run() == TRUE){
                //ha sikeres a validáció, ide jutunk
                //beszúrjuk a rekordot az adatbázisba (modell beli feladat)
                if($this->Employees_model->insert(
                    $this->input->post('name'),
                    $this->input->post('ssn'),
                    $this->input->post('tin')
                )){}
                    redirect(base_url('employees/list')); 
                
            }
        }
        
        
        //kell egy regisztrációs form
        //név,ssn,tin
        $this->load->helper('form'); //form kezelő helper, duh
        $this->load->view('employees/add');
    }






    
    public function edit($id = NULL){
        if($id == NULL){
            show_error('Missing ID for editing');
        }

        $record = $this->Employees_model->select_by_id($id);

        if($record == NULL){
            show_error('This record does not exist');
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Név', 'required');
        $this->form_validation->set_rules('ssn', 'SSN', 'required');
        $this->form_validation->set_rules('tin', 'TIN', 'required');

        if($this->form_validation->run() == TRUE){
            //ha sikeres a validáció, ide jutunk
            //beszúrjuk a rekordot az adatbázisba (modell beli feladat)
            $this->Employees_model->update($id, 
                                            $this->input->post('name'),
                                            $this->input->post('tin'),
                                            $this->input->post('ssn'));
            $this->load->helper('url');
            redirect(base_url('employees/list')); 
        }
        
        else{

            $view_params = ['emp' => $record];

            $this->load->helper('form');
            $this->load->view('employees/edit', $view_params);
        }
    }

        
    






    //paraméter nélkül is működnie kell
    public function delete($id = NULL){
        
        if($id == NULL){
            show_error('Record id missing');
        }
        
        $record = $this->Employees_model->select_by_id($id);
        
        if($record == NULL){
            show_error('Record with this id does not exist');
        }

        $this->load->helper('url');
        if($this->Employees_model->delete($id)){
            redirect(base_url('employees/list'));
        }
        else{
            show_error('Deleting of record unsuccesful');
        }
    }
}
