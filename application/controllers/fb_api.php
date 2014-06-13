<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fb_api extends CI_Controller {

    public function index()
    {
        $this->load->library("fb");
        echo json_encode(array("status" => $this->fb->userid));
    }
    public function isRegistered() {
        $this->load->library("fb");

        $hasil = array();
        $hasil['status'] = 0;

        if ($this->fb->userid) {
            if ($this->dblogin->getByFbid($this->fb->userid)) {
                $hasil['status'] = 1;
            }
        }


        echo json_encode($hasil);
    }
    public function logout() {
        $this->sess->delete(LOG_KEY);
        delete_cookie(LOG_KEY);

        $this->load->library("fb");
        $this->load->view('redirect.php', array("duration" => 500, "text" => "Logout", "toUrl" => $this->fb->fb->getLogoutUrl(array('next' => base_url()))));
    }
    public function checkFacebook() {
        $this->load->library("fb");
        if ($this->fb->userid) {

            $userfb = $this->dblogin->getBy('fbid', $this->fb->userid);
            if (isLogin()) {
                $this->load->view("redirect", array("toUrl" => base_url(), "text" => "Sudah Teregister", "duration" => 1000));
                return;
            } else if ($userfb) {

                $this->dblogin->loginProcess($userfb->fbid);
                $this->load->view("redirect", array("duration" => 0, "text" => "Login."));
                
            } else {

                $regdata['username'] = $this->fb->user['first_name'] . " " . $this->fb->user['last_name'];
                $regdata['email'] = isset($this->fb->user['email'])?$this->fb->user['email']:"";
                $regdata['logkey'] = sha1(microtime() . "simpatisan" . $regdata['email']);
                $regdata['avatar'] = $this->fb->get_avatar();
                $regdata['fbid'] = $this->fb->user['id'];
                $regdata['logby'] = (($this->sess->get("logby"))?$this->sess->get("logby"):-1);

                if ($this->dblogin->register($regdata)) {
                    $this->dblogin->loginProcess($regdata['fbid']);

                    if ($this->sess->get("logby")) {                    
                        $this->load->model("leaderboard");
                        $this->leaderboard->tambah($this->sess->get("logby"));
                    }

                    $this->load->view("redirect", array("toUrl" => base_url(), "text" => "Berhasil Register", "duration" => 1000));
                } else {
                    $this->load->view("redirect", array("toUrl" => base_url(), "text" => "Gagal Register. :(", "duration" => 1000));
                }
            }
        } else {
            $this->load->view("redirect", array("text" => "Nothing To Do Here", "duration" => 1000));
        }
    }
}
