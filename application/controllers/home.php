<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {
	
    function __construct()
    {
        parent::__construct();

        $this->load->model("ModelArticle","article");
    }
    
    public function index(){
        $data['articles'] = $this->article->getAll(true);
           
		$this->load->view('home_page', $data);
	}
}