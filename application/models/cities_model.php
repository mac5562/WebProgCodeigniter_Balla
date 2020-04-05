<?php
class cities_model extends CI_Model
{
    //put your code here
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_list()
    {
        $this->db->select('*');
        $this->db->from('cities');
        $this->db->order_by('id');

        $query = $this->db->get();
        $records = $query->result();

        return $records;
    }

    public function delete($id)
    {
        $this->db->where('id',$id);
        return $this->db->delete('cities');
    }

    public function select_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('cities');
        $this->db->where('id', $id);

        return $this->db->get()->row();
    }

    public function add($name, $postal_code)
    {
        $records = array('name' => $name, 'postal_code' => $postal_code);
        $this->db->insert('cities', $records);
    }

    public function edit($id, $name, $postal_code)
    {
        $record=['name' => $name, 'postal_code' => $postal_code];
        $this->db->where('id', $id);
        $this->db->update('cities', $record);
    }
}