<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Leaderboard extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    function tambah($id) {
        $query = $this->db->query(query_prepare("SELECT * FROM `leaderboard` WHERE `userid` = %d", $id));
        if ($query->num_rows() > 0) {
            $hasil = $query->row();
            $jumlah = $hasil->jumlah;
           	$jumlah += 1;
           	if ($this->db->update("leaderboard", array('userid' => $id, 'jumlah' => $jumlah), array('id' => $hasil->id)))
           		return true;
           	return false;
        } else {
            if ($this->db->insert("leaderboard", array("userid" => $id, "jumlah" => 1)))
            	return true;
            return false;
        }
        return false;
    }
    
}