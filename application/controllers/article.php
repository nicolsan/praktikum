<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class article extends CI_Controller {
    function __construct(){
        parent::__construct();

        $this->load->model("ModelArticle", "article");
    
    }
    
    
    public function index(){
		$this->load->view('home_page');
	}

    public function new() {
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
        $this->article->delete($articleID);

        redirect();
    }
}