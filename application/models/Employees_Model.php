<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Employees_Model
 *
 * @author akos4
 */
class Employees_Model extends CI_Model{
    //put your code here
    public function __construct(): void {
        parent::__construct();
        
        //database will be needed, SO:
        $this->load->database();
        //ezen keresztül lehet majd az adatbázist manage-elni
    }


    public function get_list(){
        //megadom a lekérdezendő mezőket a db-ben
        $this->db->select('*');
        //aztán honnan kell ez,
        $this->db->from('employees');
        //opcionális mezők, pl WHERE feltételek., rendezés
        //$this->db->where();
        $this->db->order_by('name', 'ASC'); //asc is redundant but whatever
        
        //megcsináljuk az előkészített lekérdezést
        $query = $this->db->get();
        
        //resultot letároljuk
        $result = $query->result();
        
        //példányok listáját építi ez
        return $result;
    }
}
