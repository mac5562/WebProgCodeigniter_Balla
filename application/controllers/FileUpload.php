<?php

    class FileUpload extends CI_Controller{
        public function __construct(){
            parent::__construct();
        }

        public function index(){
            
            //file validáció, egy konfigurációs asszociatív tömbön keresztül
            $uploadConfig['allowed_types'] = 'txt|jpg|png|gif';
            $uploadConfig['max_size'] = 20000; //Kbyte-ban
            
            $uploadConfig['min_height'] = 500; //px-ben
            $uploadConfig['max_height'] = 50000; //px-ben

            $uploadConfig['min_width'] = 500; //px-ben
            $uploadConfig['max_width'] = 50000; //px-ben

            $this->load->helper('form');
            $this->load->view('FileUpload/form');

        }
    }

?>