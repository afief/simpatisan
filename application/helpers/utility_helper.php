<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('asset_url')) {
    function asset_url()
    {
        return base_url() . "assets/";
    }   
}
if ( ! function_exists('image_url')) {
    function image_url($u = '')
    {
        return base_url() . "assets/images/" . $u;
    }   
}
if (! function_exists('default_avatar')) {
    function default_avatar($fbid = 'kosong') {
        $ci =& get_instance();
        if ($fbid == 'kosong') {
            if ($ci->dblogin->userdata->fbid) {
                return "http://graph.facebook.com/" . $ci->dblogin->userdata->fbid . "/picture";
            }
        } else if ($fbid != "") {
            return "http://graph.facebook.com/" . $fbid . "/picture";
        }
        return asset_url() . "images/default-avatar.png";
    }
}
if (! function_exists('user_url')) {
    function user_url($username = "") {
        if ($username == "") {
            if (isLogin()) {
                $ci =& get_instance();
                return base_url() . $ci->dblogin->userdata->username;
            } 
        } else {
            return base_url() . $username;
        }
        return "";
    }
}
if (!function_exists('current_uri')) {
    function current_uri(){
        return base_url() . uri_string();
    }
}
if (! function_exists('_s')) {  
    function _s($str) {
        if (isset($str))
            return $str;
        else
            return '';
    }
}
