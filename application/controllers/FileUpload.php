<?php

    class FileUpload extends CI_Controller{
        public function __construct(){
            parent::__construct();
        }

        public function index(){
            if ($this->input->post('submit')) {
                # code...
            
                //file validáció, egy konfigurációs asszociatív tömbön keresztül
                $uploadConfig['allowed_types'] = 'jpg|png|gif';
                $uploadConfig['max_size'] = 20000; //Kbyte-ban
                
                $uploadConfig['min_height'] = 500; //px-ben
                $uploadConfig['max_height'] = 50000; //px-ben

                $uploadConfig['min_width'] = 500; //px-ben
                $uploadConfig['max_width'] = 50000; //px-ben

                //stb stb

                $uploadConfig['upload_path'] = './uploads/'; //feltöltött fájlok tárhelye
                $uploadConfig['file_ext_tolower'] = TRUE; //kisbetűsre konvertálja a kiterjesztéseket

                $uploadConfig['overwrite'] = TRUE; //engedi a felülírást feltöltéskor


                //Feltöltéskezelő
                $this->load->library('upload');
                
                $this->upload->initialize($uploadConfig);

                if ($this->upload->do_upload('file') == TRUE) {
                    $this->load->helper('url');
                    $viewParams = ['file' => $this->upload->data()];
                    $this->load->view('fileUpload/success', $viewParams);
                }
                else {
                    $viewParams = ['errors' => $this->upload->display_errors()];
                    $this->load->helper('form');
                    $this->load->view('fileUpload/form', $viewParams);
                }        
            }
            else {
                $this->load->helper('form');
                $this->load->view('fileUpload/form', ['error' => '']);
            }
        }
        
    }
?>
