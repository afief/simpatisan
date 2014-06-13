<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Sess {

    public function __construct()
    {
        session_start();
    }

    public function get($sesskey)
    {
        if (isset($_SESSION[$sesskey])) {
            return $_SESSION[$sesskey];
        }
        return false;
    }
    public function set($sesskey, $value) {
        $_SESSION[$sesskey] = $value;
    }
    public function delete($sesskey) {
        unset($_SESSION[$sesskey]);
    }
    public function destroy() {
        session_destroy();
    }
    
}

/* End of file Someclass.php */