<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {
	function getUserIdByUsername($username) {
		if ($check = $this->db->get_where('users', array('username' => $username), 1)->row()) {
			return $check->id;
		} else {
			return false;
		}
	}
	
	function getTopUsers() {
		//For demonstration purposes gets the recent 5 users
		$this->db->order_by('created_on', 'desc');
		$this->db->limit(5);
        $query = $this->db->get('users');
        
        if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                        $data[] = $row;
                }
                return $data;
        }
        return false;
	}
}