<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {
	public function index(){
        $data['articles'] = array(
            array('title' => 'Sounds like the Halo Needler is finally getting the Nerf Blaster'),
            array('title' => 'Get a year of Playstation Plus for just $30 this weekend'),
            array('title' => 'T-Mobile delays shutdown of Sprint 3G Network'),
            array('title' => 'Woah'),
            array('title' => 'Cara ampuh melawan malas, Nomor 5 bikin heboh'),
        );

		$this->load->view('home_page', $data);
	}
}