<?php
    class Pages extends CI_Controller{
        public function view($page = 'home'){
            // als de webpagina niet bestaat dan verwijst die naar de error functie
            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $data['title'] = ucfirst($page);

            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');
        }
    }