<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Fb {

    var $userid;
    var $user;
    var $fb = null;

    public function __construct()
    {
        require 'facebook/facebook.php';

        $this->fb = new Facebook(array(
            'appId'  => '308104096001937',
            'secret' => 'b6a40f222ac4671e9280b36904838ba0',
        ));

        $this->userid = $this->fb->getUser();

        if ($this->userid) {
            try {
                $this->user = $this->fb->api('/me');
            } catch (FacebookApiException $e) {
                $this->user = null;
                $this->userid = 0;
            }
        }
    }
    public function get_avatar() {
        if ($this->fb != null) {
            $keluaran = $this->fb->api("me/picture?width=250&height=250&type=square&redirect=false");
            if (isset($keluaran['data']))
                if (isset($keluaran['data']['url']))
                    return $keluaran['data']['url'];
        }
        return "";
    }
}