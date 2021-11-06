<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelArticle extends CI_Model {
	const TABLE_NAME = 'articles';

    function __construct() {
        parent::__construct();

        $this->load->database();
    }

    public function create($article) {
        $this->db->trans_start();
        $this->db->insert(ModelArticle::TABLE_NAME, $article);
        $this->db->trans_complete();
    }
}