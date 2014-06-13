<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function query_prepare( $query, $args ) {
    if ( is_null( $query ) )
        return;

    // This is not meant to be foolproof -- but it will catch obviously incorrect usage.
    if ( strpos( $query, '%' ) === false ) {
        _doing_it_wrong( 'wpdb::prepare', sprintf( __( 'The query argument of %s must have a placeholder.' ), 'wpdb::prepare()' ), '3.9' );
    }
    
    $args = func_get_args();
    array_shift( $args );
    // If args were passed as an array (as in vsprintf), move them up
    if ( isset( $args[0] ) && is_array($args[0]) )
        $args = $args[0];
    $query = str_replace( "'%s'", '%s', $query ); // in case someone mistakenly already singlequoted it
    $query = str_replace( '"%s"', '%s', $query ); // doublequote unquoting
    $query = preg_replace( '|(?<!%)%f|' , '%F', $query ); // Force floats to be locale unaware
    $query = preg_replace( '|(?<!%)%s|', "'%s'", $query ); // quote the strings, avoiding escaped strings like %%s
    array_walk( $args, 'escape_by_ref' );
    return @vsprintf( $query, $args );
}
function escape_by_ref( &$string ) {
    if ( ! is_float( $string ) )
        $string = addslashes( $string );
}

function set_cookie($name, $value, $expire) {
    setcookie($name, $value, $expire, "/");
}
function get_cookie($key) {
    if (isset($_COOKIE[$key])) {
        return $_COOKIE[$key];
    }
    return false;
}
function delete_cookie($key) {
    setcookie($key, "", 0, "/");
}


function isLogin() {
    $ci =& get_instance();
    
    if (!$ci->sess->get(LOG_KEY)) {
        $cid = get_cookie(LOG_KEY);
        if (!$cid) {
            return false;
        } else {
            $userid = $ci->dblogin->getByKey($cid);
            if (!$userid) {
                delete_cookie(LOG_KEY);
                return false;
            } else {
                $ci->sess->set(LOG_KEY, $cid);
            }
        }
    } else {
        $userid = $ci->dblogin->getByKey($ci->sess->get(LOG_KEY));
        if (!$userid || !$userid->id) {
            return false;
        }
    }
    return true;    
}