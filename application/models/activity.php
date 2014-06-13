<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Activity extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    function login($username, $status) {
        $ip = isset($_SERVER['REMOTE_ADDR'])?$_SERVER['REMOTE_ADDR']:'';
        $agen = isset($_SERVER['HTTP_USER_AGENT'])?$_SERVER['HTTP_USER_AGENT']:'';
        
        $this->db->insert('user_login', array('username' => $username, 'ip' => $ip, 'agen' => $agen, 'status' => $status));
    }
    
}