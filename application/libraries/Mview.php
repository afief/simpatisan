<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mview {

    var $r = array();

    public function addView($key, $val) {

        if (!isset($this->r[$key])) {
            $this->r[$key] = $val;
        } else {
            if (gettype($this->r[$key]) != 'array') {
                $temp = $this->r[$key];
                $this->r[$key] = array();
                array_push($this->r[$key], $temp);
            }
            array_push($this->r[$key], $val);
        }
    }

    public function toView() {
        $ci =& get_instance();
        $this->r['userdata'] = $ci->dblogin->userdata;
        return $this->r;
    }
}