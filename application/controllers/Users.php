<?php
    class Users extends CI_Controller{
        // register page
        public function register(){
            $data['title'] = 'Sign Up';

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required|call_check_username_exists');
            $this->form_validation->set_rules('email', 'Email', 'required|call_check_email_exists');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('users/register', $data);
                $this->load->view('templates/footer');
            } else {
                // Encrypt password
                $enc_password = md5($this->input->post('password'));

                $this->user_model->register($enc_password);

                //Set message
                $this->session->set_flashdata('user_loggedin', 'You are logged in.');

                redirect('posts');
            }
        }

        // login page
        public function login(){
            $data['title'] = 'Log in';

            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('users/login', $data);
                $this->load->view('templates/footer');
            } else {
                // Get username
                $username = $this->input->post('username');
                // Encrypt de password
                $password = md5($this->input->post('password'));

                // Login user
                $user_id = $this->user_model->login($username, $password); 

                if($user_id){
                    //Session
                    die('Succes');
                    //Set message
                    $this->session->set_flashdata('user_registered', 'You are now registered and can log in');
                    redirect('posts');
                } else{
                    //Set message
                    $this->session->set_flashdata('login_failed', 'Login is invalid');
                    redirect('user/login');
                }
                
            }
        }

        // checkt of er een username als bestaat
        function check_username_exists($username){
            
            if($this->user_model->check_username_exists($this->input->post('username'))){ 
                return true;
            } else {
                $this->form_validation->set_message('
            check_username_exists', 'Username is taken. Get another username');
                return false;
            }
        }

        // checkt of er een email als bestaat
        function check_email_exists($email){
            
            if($this->user_model->check_email_exists($this->input->post('email'))){ 
                return true;
            } else {
                $this->form_validation->set_message('
            check_email_exists', 'email is taken. Get another username');
                return false;
            }
        }

        
    }