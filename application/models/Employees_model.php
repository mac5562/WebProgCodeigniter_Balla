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
class Employees_model extends CI_Model
{
    //put your code here
    public function __construct()
    {
        parent::__construct();
        
        //database will be needed, SO:
        $this->load->database();
        //ezen keresztül lehet majd az adatbázist manage-elni
    }


    public function get_list()
    {
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

    public function insert($name, $ssn, $tin)
    {
        //szervezzük az adatokat egy asszociatív tömbbe, ahol a kulcs értékek a db meők nevei, a hozzá
        //tartozó értékek pedig a konkrét értékei a db-nek
        $record = array(
            'name' => $name,
            'ssn' => $ssn,
            'tin' => $tin
        );
        //hívjuk meg az insertet és adjuk vissza az értékét
        $this->db->insert('employees', $record);
    }

    public function delete($id)
    {
        //paraméterből megnézem, hogy valós törlés E.
        //lekérdezem, hogy van e ilyen id: ha igen, yay, ha nem, hiba :s

        $this->db->where('id',$id);
        return $this->db->delete('employees');
    }

    public function select_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('employees');
        $this->db->where('id',$id);
        
        return $this->db->get()->row(); 
        //azért ilyen (és nem $result), mert csak 1 sort ad vissza

    }

    public function update($id, $name, $tin, $ssn)
    {
        $record=['name' => $name, 'tin' => $tin, 'ssn' => $ssn];
        $this->db->where('id', $id);
        $this->db->update('employees', $record);
    }
}
