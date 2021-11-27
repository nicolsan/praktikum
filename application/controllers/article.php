<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class article extends CI_Controller {
    function __construct(){
        parent::__construct();

        $this->load->model("modelarticle", 'article');
        $this->load->model("ModelUser",'user');
    }
    
    
    public function index(){
		$this->load->view('home_page');
	}

    public function new() {
        if ($this->session->userdata('logged_in') ==NULL) {
            redirect('/');
        }

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title','Article Title', 'required');
        $this->form_validation->set_rules('summary','Summary', 'required');
        $this->form_validation->set_rules('content','Content', 'required');

        if ($this->form_validation->run() == FALSE) {
            return $this->load->view('create_article');
        }

        $article = array (
            'title' => $this->input->post('title'),
            'summary' => $this->input->post('summary'),
            'content' => $this->input->post('content'),
        );

        try {
            $this->article->create($article);

            return $this->load->view('home_page');
        } catch (Exception $e) {
            show_error($e->getMessage());
            return;
        }
    }

    public function read($articleID) {
        $data["article"] = $this->article->getByID($articleID, true);
       
        return $this->load->view('read_article', $data);
    }

    public function edit($articleID) {
        if ($this->session->userdata('logged_in') ==NULL) {
            redirect('/');
        }

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title','Article Title', 'required');
        $this->form_validation->set_rules('summary','Summary', 'required');
        $this->form_validation->set_rules('content','Content', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data["article"] = $this->article->getByID($articleID, true); 
            return $this->load->view('edit_article', $data);
        }

        $article = array (
            'id' => $this->input->post('id'),
            'title' => $this->input->post('title'),
            'summary' => $this->input->post('summary'),
            'content' => $this->input->post('content'),
        );

        try {
            $this->article->update($article);

            redirect("/");
        } catch (Exception $e) {
            show_error($e->getMessage());
            return;
        }
    }

    public function delete($articleID) {
        if ($this->session->userdata('logged_in') ==NULL) {
            redirect('/');
        }
        
        $this->article->delete($articleID);

        redirect();
    }

    public function login() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username','Username', 'required');
        $this->form_validation->set_rules('password','Password', 'required');
    

        if ($this->form_validation->run() == FALSE) {
            return $this->load->view('login_page');
        }

        
        try {
            $user = $this->user->getByUsername($this->input->post('username'), false);
            if (!password_verify($this->input->post('password'), $user[0]->password)) {
                echo "password doesn't match";

                return;
            }

            $this->session->set_userdata(array('userid' => $user[0]->id, 'logged_in' => true));
            
            redirect('/');
        } catch (Exception $e) {
            show_error($e->getMessage());
            return;
        }
    }

    public function logout() {
        $this->session->sess_destroy();

        redirect("/");
    }
    

}