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

    public function getAll($toArray) {
        $query = $this->db->get(ModelArticle::TABLE_NAME);
        
        if($toArray) {
            return $query->result_array();
        }

        return $query->result();
    
    }

    public function getByID($articleID, $toArray) {
        $query = $this->db->get_where(ModelArticle::TABLE_NAME, array('id' => $articleID));
        
        if($toArray) {
            return $query->result_array();
        }

        return $query->result();
    }

}