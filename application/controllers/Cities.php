<?php

class Cities extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cities_model');       
    }
}
