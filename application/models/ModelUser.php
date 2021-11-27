<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelUser extends CI_Model {
    const TABLE_NAME = 'users';

    function __construct() {
        parent::__construct();

        $this->load->database();
    }

    public function create($user) {
        $this->db->trans_start();
        $this->db->insert(ModelUser::TABLE_NAME, $user);
        $this->db->trans_complete();
    }

    public function getAll($toArray) {
        $query = $this->db->get(ModelUser::TABLE_NAME); // SELECT * FROM articles;

        if ($toArray) {
            return $query->result_array(); // $array['key'];
        }

        return $query->result(); // $obj->field;
    }

    public function getByID($userID, $toArray) {
        $query = $this->db->get_where(ModelUser::TABLE_NAME, array('id' => $userID));

        if ($toArray) {
            return $query->result_array(); // $array['key'];
        }

        return $query->result(); // $obj->field;        
    }

    public function getByUsername($username, $toArray) {
        $query = $this->db->get_where(ModelUser::TABLE_NAME, array('username' => $username));

        if ($toArray) {
            return $query->result_array(); // $array['key'];
        }

        return $query->result(); // $obj->field;        
    }

    public function update($user) {
        $this->db->trans_start();
        $this->db->update(ModelUser::TABLE_NAME, $user, array('id' => $user["id"]));
        $this->db->trans_complete();
    }

    public function delete($userID) {
        $this->db->trans_start();
        $this->db->delete(ModelUser::TABLE_NAME, array('id' => $userID));
        $this->db->trans_complete();
    }
}
