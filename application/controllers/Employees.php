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
    
    public function add(){
        //kell egy regisztrációs form
        //név,ssn,tin
        $this->load->helper('form'); //form kezelő helper, duh
        $this->load->view('employees/add');
    }
    
    public function edit(){
        echo "edit";
    }
    
    public function delete(){
        echo "delete";
    }
}
