<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dblogin extends CI_Model {

    var $userdata;


    function __construct() {
        parent::__construct();
    }

    function getBy($by, $value) {
        $query = $this->db->query(query_prepare("SELECT * FROM `users` WHERE `" . $by . "` = %s LIMIT 0, 1", $value));
        if ($query->num_rows() > 0) {
            $users = $query->row();            
            return $users;
        } else {
            return false;
        }
    }

    function getByKey($key) {
        $query = $this->db->query(query_prepare("SELECT * FROM `users` WHERE `logkey` = %s LIMIT 0, 1", $key));
        if ($query->num_rows() > 0) {
            $this->userdata = $query->row();
            $this->getLikes($this->userdata->id);
            return $this->userdata;
        } else {
            return false;
        }
    }
    function getByFbid($fbid) {
        $query = $this->db->query(query_prepare("SELECT * FROM `users` WHERE `fbid` = %s LIMIT 0, 1", $fbid));
        if ($query->num_rows() > 0) {
            $this->userdata = $query->row();

            return $this->userdata;
        } else {
            return false;
        }
    }
    function getByEmail($email) {
        $query = $this->db->query(query_prepare("SELECT * FROM `users` WHERE `email` = %s LIMIT 0, 1", $email));
        if ($query->num_rows() > 0) {
            $this->userdata = $query->row();
            $this->getLikes($this->userdata->id);
            return $this->userdata;
        } else {
            return false;
        }
    }
    function getByUsername($username) {
        $query = $this->db->query(query_prepare("SELECT * FROM `users` WHERE `username` = %s LIMIT 0, 1", $username));
        if ($query->num_rows() > 0) {
            $this->userdata = $query->row();
            $this->getLikes($this->userdata->id);
            return $this->userdata;
        } else {
            return false;
        }
    }
    function getLikes($id) {
        $query = $this->db->query(query_prepare("SELECT `jumlah` FROM `leaderboard` WHERE `userid` = %d", $id));
        if ($query->num_rows() > 0) {
            $hasil = $query->row();
            $this->userdata->likes = $hasil->jumlah;
        } else {
            $this->userdata->likes = -1;
        }
    }

    function setAvatar($id, $avatar) {        
        $query = $this->db->query(query_prepare("UPDATE `users` SET `avatar` = %s WHERE `id` = %d;", $avatar, $id));
        if ($query) return true;
        return false;
    }
    
    function register($arg) {
        $column = array();

        $column['username']       = $arg['username'];        
        $column['email']          = $arg['email'];
        $column['logkey']         = $arg['logkey'];
        $column['avatar']         = $arg['avatar'];
        $column['fbid']           = $arg['fbid'];
        $column['logby']          = $arg['logby'];

        $ceksama = $this->db->query(query_prepare("SELECT * FROM `users` WHERE `fbid` = %s", $column['fbid']));

        if ($ceksama->num_rows > 0) {

            $cekrow = $ceksama->row();
            setAvatar($cekrow->id, $column['avatar']);
            return true;

        } else {
            if ($column['fbid']) {
                if ($this->db->insert('users', $column)) {
                    return true;
                }
            }
        }

        return false;
    }

    function kesempatan() {
        $jumlah = 0;
        $ip = $_SERVER['REMOTE_ADDR'];

        $kueri = $this->db->query(query_prepare("SELECT `status` FROM `user_login` WHERE `ip` = %s ORDER BY `user_login`.`status` ASC LIMIT 0, 3", $ip));
        if ($kueri->num_rows() > 0) {
            foreach ($kueri->result() as $row)
            {
                if ($row->status > 0) {
                    $jumlah++;
                }
            }
        }
        return $jumlah;
    }
    
    //proses login semua masuk ke sini, harus ada username dan password
    function loginProcess($fbid) {

        $this->load->model('activity');
        if (!$this->dblogin->getByFbid($fbid)) {
            //login fail
            $this->load->view('redirect.php', array("toUrl" => base_url() . "login?note=wrong", "duration" => 1500, "text" => "Wrong Username / Password"));
            $this->activity->login($fbid, 0);
        } else {
            //login success
            $this->sess->set(LOG_KEY, $this->dblogin->userdata->logkey);
            set_cookie(LOG_KEY, $this->dblogin->userdata->logkey, time() + 604800);

            $this->activity->login($fbid, 1);
        }
    }
}